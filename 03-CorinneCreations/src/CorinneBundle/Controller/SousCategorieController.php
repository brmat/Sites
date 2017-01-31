<?php

namespace CorinneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

use CorinneBundle\Entity\SousCategorie;
use CorinneBundle\Form\SousCategorieType;

/**
 * SousCategorie controller.
 *
 */
class SousCategorieController extends Controller
{
    /**
     * Lists all SousCategorie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sousCategories = $em->getRepository('CorinneBundle:SousCategorie')->findAll();

        return $this->render('@Corinne/admin/souscategorie/index.html.twig', array(
            'sousCategories' => $sousCategories,
        ));
    }

    /**
     * Creates a new SousCategorie entity.
     *
     */
    public function newAction(Request $request)
    {
        $sousCategorie = new SousCategorie();
        $form = $this->createForm('CorinneBundle\Form\SousCategorieType', $sousCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sousCategorie);
            $em->flush();

            $this->addFlash (
                'success',
                'Sous catégorie ajoutée avec succès');

            return $this->redirectToRoute('souscategorie_index', array('id' => $sousCategorie->getId()));
        }

        return $this->render('@Corinne/admin/souscategorie/new.html.twig', array(
            'sousCategorie' => $sousCategorie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SousCategorie entity.
     *
     */
    public function editAction(Request $request, SousCategorie $sousCategorie)
    {
        $deleteForm = $this->createDeleteForm($sousCategorie);
        $editForm = $this->createForm('CorinneBundle\Form\SousCategorieType', $sousCategorie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sousCategorie);
            $em->flush();

            $this->addFlash(
                'success',
                'Sous catégorie modifiée avec succès'
            );

            return $this->redirectToRoute('souscategorie_index');
        }

        return $this->render('@Corinne/admin/souscategorie/edit.html.twig', array(
            'sousCategorie' => $sousCategorie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SousCategorie entity.
     *
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $sous_scateg = $em->getRepository('CorinneBundle:SousCategorie')->findOneById($id);
        $objet = $em->getRepository('CorinneBundle:Objet')->findOneBySousCateg($sous_scateg);

//       var_dump($objet);die();
// condition si objet vide supprimer
        if (isset($objet)){
            $this->addFlash(
                'error',
                'Vous ne pouvez pas supprimer la sous categorie si des oeuvres y sont associées'
            );

            return $this->redirectToRoute('souscategorie_index');
        }
        else{
            $this->addFlash(
                'success',
                'Sous catégorie supprimée avec succès'
            );

            $em->remove($sous_scateg);
            $em->flush();

            return $this->redirectToRoute('souscategorie_index');
        }
    }

    /**
     * Creates a form to delete a SousCategorie entity.
     *
     * @param SousCategorie $sousCategorie The SousCategorie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SousCategorie $sousCategorie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('souscategorie_delete', array('id' => $sousCategorie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
