<?php

namespace CorinneBundle\Controller;


use CorinneBundle\Entity\Categorie;
use CorinneBundle\Entity\Presse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

//  FONCTION D'APPEL DES PAGES QUE L'ON VEUT AFFICHER

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $objets = $em->getRepository('CorinneBundle:Objet')->findBy( array('slider' => 1) );


        return $this->render('CorinneBundle:Default:index.html.twig', array(
            'objets' => $objets));
    }

    public function parcoursAction()
    {
        return $this->render('CorinneBundle:User:parcours.html.twig');
    }

    public function creationAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('CorinneBundle:Categorie')->findAll();

        return $this->render('CorinneBundle:User:mes_creations.html.twig', array(
            'categories' => $categories
        ));
    }

    public function ecolabelAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ecolabels = $em->getRepository('CorinneBundle:Ecolabel')->findAll();

        return $this->render('@Corinne/User/eco_label.html.twig', array(
            'ecolabel' => $ecolabels
        ));
    }

    public function contactAction()
    {
        return $this->render('CorinneBundle:User:contact.html.twig');
    }

    public function atelierAction()
    {
        return $this->render('CorinneBundle:User:atelier.html.twig');
    }

    public function accessAction()
    {
        return $this->render('@Corinne/access.html.twig');
    }

    public function presseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $presses = $em->getRepository('CorinneBundle:Presse')->findAll();

        return $this->render('@Corinne/User/presse.html.twig', array(
            'presses' => $presses
        ));
    }

    public function eventAction()
    {
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('CorinneBundle:Event')->findAll();


        return $this->render('@Corinne/User/event.html.twig', array(
            'events' => $events
        ));
    }

    public function mailClientAction()
    {
        return $this->render('@Corinne:User:mailclient.html.twig');
    }

    public function mailCorinneCreationAction()
    {
        return $this->render('@Corinne:User:mailcorinnecreation.html.twig');
    }

    public function mentionAction()
    {

        return $this->render('@Corinne/User/mention.html.twig');
    }
}
