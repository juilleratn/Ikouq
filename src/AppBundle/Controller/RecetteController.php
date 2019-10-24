<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quantite;
use AppBundle\Entity\Recette;
use AppBundle\Entity\Ingredient;
use AppBundle\Repository\QuantiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Dompdf\Dompdf;
use Dompdf\Options;
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

    /**
     * Permet de voir une recette complète(user)
     *
     * @Route("/recette/{nom}", name="recette_recipe")
     * @param Recette $recette
     *
     * @return Response
     */
    public function showRecipe(Recette $recette)
    {

        $em = $this->getDoctrine()->getManager();
        $results = $em->getRepository('AppBundle:Quantite')->getQuantitéByIngredients($recette);

        $tabQuantitesIngredients = [];
        $ingredients = [];
        //Pour la recette choisi, on lui associe dans un tableau associatif les quantités et les ingredients(nom, mesure, etc)
        foreach ($results as $result) {
            $ingredients[] = $result->getFkIngredient();
            $tabQuantitesIngredients[($result->getFkIngredient()->getNom())] =
                ["quantite" => $result->getQuantite(),
                    "objet" => $result->getFkIngredient()];
        }

        return $this->render('recette/recipe.html.twig', [
            'recette' => $recette,
            'quantitesIngredients' => $tabQuantitesIngredients
        ]);
    }

    public function ajaxAction(Request $request)
    {
        $listeCourse = $request->request->get('liste');
    }

    /**
     * Imprimer un pdf de la liste d'ingrédient(user)
     *
     * @Route("{id}", name="liste_course")
     * @return Response
     */
    public function index(Recette $recette)
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->set('isJavascriptEnabled', TRUE);

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('recette/pdf_course.html.twig', [
            'recette'=> $recette
        ])
        ;

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
    }




    }
