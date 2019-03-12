<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recurso;

class CrudRecursoController extends AbstractController
{
    /**
     * @Route("/crud/recurso", name="crud_recurso")
     */
     public function CrearRecurso(){
         $em = $this->getDoctrine()->getManager();
         $recurso= new Recurso();
         $recurso->setNombre("Cemento");
         $recurso->setPrecio("100");
         var_dump($recurso);
         //die;
         $em->persist($recurso);
         $em->flush();
     }

     public function LeerRecurso(){
       $em = $this->getDoctrine()->getManager();
       $Recurso= $em->find(Recurso::class, $id);
       echo $Recurso->getNombre(). " " . $Recurso->getPrecio();
     }

     public function ActualizarRecurso($opcion){
       $opcion="N";
       $em = $this->getDoctrine()->getManager();
       $Recurso= $em->find(Recurso::class, $id);
       if ($opcion=="N"){
            $Recurso->setNombre("NuevoNombre");
       }
       else{
         if($opcion=="P"){
           $Recurso->setPrecio("200");
         }
       }
       $em->flush();
     }

     public function EliminarRecurso(){
         $em = $this->getDoctrine()->getManager();
         $Recurso= $em->find(Recurso::class, $id);
         $Recurso->setId(null);
         $em->flush();         
     }


    public function index()
    {
        return $this->render('crud_recurso/index.html.twig', [
            'controller_name' => 'CrudRecursoController',
        ]);
    }
}
