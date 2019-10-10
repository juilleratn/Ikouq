<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quantite;
use AppBundle\Entity\Recette;
use AppBundle\Entity\Ingredient;
use AppBundle\Repository\QuantiteRepository;
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
     * Répertorie toutes les recettes(Admin et user)
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
     * Créer une nouvelle recette(Admin)
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
     * Trouve et affiche une recette(Admin)
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
     * Affiche un formulaire pour modifier une recette existante.(Admin)
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
     * Supprime une recette(Admin)
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
     * Crée un formulaire pour supprimer une recette.(Admin)
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
            ->getForm();

    }

//    /**
//     * Permet de voir une recette( user)
//     *
//     * @Route("/recette/{id}", name="recette_recipe")
//     *
//     * @return Response
//     */
//    public function showRecipe(Recette $recette, Ingredient $ingredient){
//
//        $em = $this->getDoctrine()->getManager();
//        $ingredients = $em->getRepository('AppBundle:Ingredient')->findAll();
//
//        $quantites = [];
//        foreach($ingredients as $ingredient) {
//            $quantites = $em->getRepository('AppBundle:Quantite')->findQuantiteByIngredient($recette, $ingredient);
//        }
//        return $this->render('recette/recipe.html.twig', [
//            'recette' => $recette,
//            'ingredients' => $ingredients,
//            'quantites'=> $quantites
//        ]);
//    }



    /**
    //     * Permet de voir une recette( user)
    //     *
    //     * @Route("/recette/{id}", name="recette_recipe")
    //     *
    //     * @return Response
    //     */
    public function showRecipe($id, Recette $recette){
        $em = $this->getDoctrine()->getManager();
        $recipe = $em->findQuantiteByIngredient($id);

        return $this->render('recette/recipe.html.twig', [
            'recette' => $recette,
            'recipe' => $recipe
        ]);
    }



}
