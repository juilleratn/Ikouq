<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quantite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Quantite controller.
 *
 * @Route("quantite")
 */
class QuantiteController extends Controller
{
    /**
     * Lists all quantite entities.
     *
     * @Route("/", name="quantite_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quantites = $em->getRepository('AppBundle:Quantite')->findAll();

        return $this->render('quantite/index.html.twig', array(
            'quantites' => $quantites,
        ));
    }

    /**
     * Creates a new quantite entity.
     *
     * @Route("/new", name="quantite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $quantite = new Quantite();
        $form = $this->createForm('AppBundle\Form\QuantiteType', $quantite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quantite);
            $em->flush();

            return $this->redirectToRoute('quantite_show', array('id' => $quantite->getId()));
        }

        return $this->render('quantite/new.html.twig', array(
            'quantite' => $quantite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a quantite entity.
     *
     * @Route("/{id}", name="quantite_show")
     * @Method("GET")
     */
    public function showAction(Quantite $quantite)
    {
        $deleteForm = $this->createDeleteForm($quantite);

        return $this->render('quantite/show.html.twig', array(
            'quantite' => $quantite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing quantite entity.
     *
     * @Route("/{id}/edit", name="quantite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Quantite $quantite)
    {
        $deleteForm = $this->createDeleteForm($quantite);
        $editForm = $this->createForm('AppBundle\Form\QuantiteType', $quantite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quantite_edit', array('id' => $quantite->getId()));
        }

        return $this->render('quantite/edit.html.twig', array(
            'quantite' => $quantite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a quantite entity.
     *
     * @Route("/{id}", name="quantite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Quantite $quantite)
    {
        $form = $this->createDeleteForm($quantite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($quantite);
            $em->flush();
        }

        return $this->redirectToRoute('quantite_index');
    }

    /**
     * Creates a form to delete a quantite entity.
     *
     * @param Quantite $quantite The quantite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Quantite $quantite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('quantite_delete', array('id' => $quantite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
