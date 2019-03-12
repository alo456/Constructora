<?php

namespace App\Controller;

use App\Entity\Envio;
use App\Entity\Recurso;
use App\Entity\Servicio;
use App\Form\CotizacionType;
use App\Form\DatosType;
use App\Form\EfectivoType;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class GlobalController extends Controller {

    public function galeria() {
        $result = exec("python test.py C:\wamp64\www\Construrama");
        var_dump($result);
        $result_array = json_decode($result);
        var_dump($result_array);
        die;
        foreach($result_array as $row){
            echo $row . "<BR>";
        }
        die;
        $directory = $this->get('kernel')->getProjectDir() . '/public/test.py';
        var_dump($directory);
        $data = array('as', 'df', 'gh');
        $result = exec("python test.py \tmp");
        //$result = shell_exec('python C:\wamp64\www\Construrama/public/test.py');
        $resultData = json_decode($result);
        var_dump($resultData, $result);
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
//        $servicios = $qb->select('s.nombre, s.precio')
//                ->from('Servicio', 's');
        $servicios = $em->getRepository(Servicio::class)->findAll();
        $recursos = $qb->select('r.nombre , r.precio')
                ->from('Recurso', 'r');
        $envio = $qb->select('e.nombre , e.precio')
                ->from('Envio', 'e');
       // var_dump($servicios);
        return $this->render('galeria.html.twig', array('servicios'=>$servicios));
    }

    public function cotizador(Request $request, Swift_Mailer $mailer) {
        $note = "";
        //var_dump($request->request);
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $servicios = $qb->select('s.id , s.nombre, s.precio')
                ->from(Servicio::class, 's')
                ->getQuery()
                ->getResult();
        $qb = $em->createQueryBuilder();
        $recursos = $qb->select('r.id ,r.nombre , r.precio')
                ->from(Recurso::class, 'r')
                ->getQuery()
                ->getResult();
        $qb = $em->createQueryBuilder();
        $envios = $qb->select('e.id ,e.tipo, e.precio , e.descripcion')
                ->from(Envio::class, 'e')
                ->getQuery()
                ->getResult();
        $result = array();
        $datos = array();
        foreach ($recursos as $recurso) {
            $result['producto'][$recurso['nombre']] = $recurso['id'];
            $datos[$recurso['id']] = $recurso['precio'];
        }
        foreach ($servicios as $servicio) {
            $result['producto'][$servicio['nombre']] = $servicio['id'];
            $datos[$servicio['id']] = $servicio['precio'];
        }
        foreach ($envios as $envio) {
            $result['envio'][$envio['tipo']] = $envio['id'];
            $datos[$envio['id']] = $envio['precio'];
        }

        
        //------------FORMS
        $form = $this->get('form.factory');
        $formCotizacion = $form->createNamedBuilder("Cotizacion", CotizacionType::class, $result['producto'], ['attr'=>$result['envio']])->getForm();
        $formDatos = $form->createNamedBuilder("Datos", DatosType::class)->getForm();
        $formEfectivo = $form->createNamedBuilder("Efectivo", DatosType::class)->getForm();
        
        $formDatos->handleRequest($request);
        $formCotizacion->handleRequest($request);
        $formEfectivo->handleRequest($request);

        //------------SUBMITED
        if ($formDatos->isSubmitted() && $formDatos->isValid()) {
            $datos = $formDatos->getData();
            $values = [];
            parse_str($datos['data'],$values);
            $productos = $values['Cotizacion']['productos'];
            $total = $values['Cotizacion']['total'];
            $envio = $values['Cotizacion']['costoenvio'];
//            var_dump($productos);
//            var_dump($total);
            $message = new Swift_Message('Cotización');
            try {
                $message->setTo($datos['email']);
            } catch (Swift_RfcComplianceException $e) {
                $note =  "Address " . $datos['email'] . " seems invalid";
            }

            /* and now your transport... */
            try {
                $message
                        ->setFrom('user.vitm17@gmail.com')
                        ->setBody(
                        $this->renderView(
                                'mail.html.twig',
                                array(
                                    'productos' => $productos,
                                    'total' => $total,
                                    'datos' => $datos,
                                    'envio' => $envio
                        )),
                        'text/html'
                );
                //echo($message->getBody());
                $mailer->send($message);
            } catch (\Swift_TransportException $Ste) {
                $note = "Error al enviar";
            }
            header("Refresh:0");
            
        }
        
        if($formEfectivo->isSubmitted() && $formEfectivo->isValid()){
            $datos = $formEfectivo->getData();
            $values = [];
            parse_str($datos['data'], $values);
            $productos = $values['Cotizacion']['productos'];
            $total = $values['Cotizacion']['total'];
            $envio = $values['Cotizacion']['costoenvio'];
//            var_dump($datos);
//            var_dump($values['Cotizacion']);
//            var_dump($productos);
//            die;
//            var_dump($productos);
//            var_dump($total);
            $message = new Swift_Message('Cotización');
            try {
                $message->setTo($datos['email']);
            } catch (Swift_RfcComplianceException $e) {
                $note =  "Address " . $datos['email'] . " seems invalid";
            }

            /* and now your transport... */
            try {
                $message
                        ->setFrom('user.vitm17@gmail.com')
                        ->setBody(
                        $this->renderView(
                                'mail.html.twig',
                                array(
                                    'productos' => $productos,
                                    'total' => $total,
                                    'datos' => $datos,
                                    'envio' => $envio
                        )),
                        'text/html'
                );
                //echo($message->getBody());
                $mailer->send($message);
            } catch (\Swift_TransportException $Ste) {
                $note = "Error al enviar";
            }
            header("Refresh:0");
        }


        return $this->render('cotizador.html.twig', array(
                    'formCotizacion' => $formCotizacion->createView(),
                    'formDatos' => $formDatos->createView(),
                    'formEfectivo' => $formEfectivo->createView(),
                    'envio' => $envio,
                    'datos' => json_encode($datos, JSON_UNESCAPED_UNICODE),
                    'mensaje' => $note
        ));
    }

}
