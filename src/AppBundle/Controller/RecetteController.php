<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recette;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Recette controller.
 *
 * @Route("recette")
 */
class RecetteController extends Controller
{
    /**
     * Lists all recette entities.
     *
     * @Route("/", name="recette_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recettes = $em->getRepository('AppBundle:Recette')->findAll();

        return $this->render('recette/index.html.twig', array(
            'recettes' => $recettes,
        ));
    }

    /**
     * Creates a new recette entity.
     *
     * @Route("/new", name="recette_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $recette = new Recette();
        $form = $this->createForm('AppBundle\Form\RecetteType', $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recette);
            $em->flush();

            return $this->redirectToRoute('recette_show', array('id' => $recette->getId()));
        }

        return $this->render('recette/new.html.twig', array(
            'recette' => $recette,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a recette entity.
     *
     * @Route("/{id}", name="recette_show")
     * @Method("GET")
     */
    public function showAction(Recette $recette)
    {
        $deleteForm = $this->createDeleteForm($recette);

        return $this->render('recette/show.html.twig', array(
            'recette' => $recette,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing recette entity.
     *
     * @Route("/{id}/edit", name="recette_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Recette $recette)
    {
        $deleteForm = $this->createDeleteForm($recette);
        $editForm = $this->createForm('AppBundle\Form\RecetteType', $recette);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recette_edit', array('id' => $recette->getId()));
        }

        return $this->render('recette/edit.html.twig', array(
            'recette' => $recette,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a recette entity.
     *
     * @Route("/{id}", name="recette_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Recette $recette)
    {
        $form = $this->createDeleteForm($recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($recette);
            $em->flush();
        }

        return $this->redirectToRoute('recette_index');
    }

    /**
     * Creates a form to delete a recette entity.
     *
     * @param Recette $recette The recette entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Recette $recette)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recette_delete', array('id' => $recette->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
