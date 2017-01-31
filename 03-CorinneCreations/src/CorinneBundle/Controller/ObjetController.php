<?php

namespace CorinneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CorinneBundle\Entity\Objet;
use CorinneBundle\Form\ObjetType;

/**
 * Objet controller.
 *
 */
class ObjetController extends Controller
{
    /**
     * Lists all Objet entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $objets = $em->getRepository('CorinneBundle:Objet')->findAll();

        return $this->render('@Corinne/admin/objet/index.html.twig', array(
            'objets' => $objets,
        ));
    }

    /**
     * Creates a new Objet entity.
     *
     */
    public function newAction(Request $request)
    {
        $objet = new Objet();
        $form = $this->createForm('CorinneBundle\Form\ObjetType', $objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $objet->setCateg($objet->getSousCateg()->getCategorie());

            $em = $this->getDoctrine()->getManager();
            $em->persist($objet);
            $em->flush();

            $this->addFlash(
                'success',
                'Une oeuvres a été ajoutée avec succès'
            );

            return $this->redirectToRoute('objet_index', array('id' => $objet->getId()));
        }

        return $this->render('@Corinne/admin/objet/new.html.twig', array(
            'objet' => $objet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Objet entity.
     *
     */
    public function editAction(Request $request, Objet $objet)
    {
        $deleteForm = $this->createDeleteForm($objet);
        $editForm = $this->createForm('CorinneBundle\Form\ObjetType', $objet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $objet->preUpload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($objet);
            $em->flush();

            $this->addFlash(
                'success',
                'L\'oeuvres a été modifiée avec succès'
            );

            return $this->redirectToRoute('objet_index', array('id' => $objet->getId()));
        }

        return $this->render('@Corinne/admin/objet/edit.html.twig', array(
            'objet' => $objet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Objet entity.
     *
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $objet = $em->getRepository('CorinneBundle:Objet')->findOneById($id);
        $em->remove($objet);
        $em->flush();

        $this->addFlash(
                'success',
                'l\'oeuvre a été supprimée avec succès'
            );

        return $this->redirectToRoute('objet_index');


    }

    /**
     * Creates a form to delete a Objet entity.
     *
     * @param Objet $objet The Objet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Objet $objet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('objet_delete', array('id' => $objet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
