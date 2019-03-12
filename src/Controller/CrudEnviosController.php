<?php

namespace App\Controller;

use App\Entity\Envio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CrudEnviosController extends AbstractController
{
/*ESTOS 4 SON EL CRUD PARA LA TABLA ENVIOS*/
     public function CrearTipoEnvio($tipoenvio,$precioenvio,$des){
         $em = $this->getDoctrine()->getManager();
         $tipo= new Envio();
         $tipo->setTipo($tipoenvio); /*NUEVO TIPO*/
         $tipo->setPrecio($precioenvio); /*PRECIO PARA EL NUEVO TIPO*/
         $tipo->getDescripcion($des); /*DESCRIPCION TIPO NUEVO*/

         var_dump($envio);
         $em->persist($tipo);
         $em->flush();
     }

     public function LeerTipoEnvio($id){
       $em = $this->getDoctrine()->getManager();
       $envio= $em->find(Envio::class, $id);
       echo "El tipo es" . $envio->getTipo(). " con el precio: " . $envio->getPrecio() . " Y consiste en: ". $envio->getDescripcion();
     }

     public function ActualizarTipoEnvio($tipo){
       $em = $this->getDoctrine()->getManager();
       $envio= $em->find(Envio::class, $tipo);
       /*test*/
       if($envio!=null){
       $envio->setTipo("5");
       $envio->setPrecio("500000");
       $envio->setDescripcion("Esto es una prueba");
       $em->flush();
       }
     }

     public function EliminarTipoEnvio($tipo){
         $em = $this->getDoctrine()->getManager();
         $envio=$em->find(Envio::class, $tipo);

         if($envio!=null){
         $envio->setId(null);
         $em->flush();
       }
     }
/*ESTOS 3 SON EL CRUD PARA MODIFICAR LOS DATOS PARA UNA COMPRA*/
     public function CrearEnvio(){
  /*enlazar el envio a un MaterialesPorServicio NO TENGO IDEAS DE COMO HACERLO*/
     }
     public function ActualizarEnvio(){
  /*cosas como agregar,cambiar,eliminar CONCEPTOS*/
     }
     public function EliminarEnvio(){
  /*ELIMINAR EL ENLACE DEL ENVIO  CON EL MaterialesPorServicio*/
     }



    public function index()
    {
        return $this->render('crud_recurso/index.html.twig', [
            'controller_name' => 'CrudRecursoController',
        ]);
    }
}
