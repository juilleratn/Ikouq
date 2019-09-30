<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredient
 *
 * @ORM\Table(name="ingredient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 */
class Ingredient
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="nutri_score", type="integer")
     */
    private $nutriScore;

    /**
     * @var string
     *
     * @ORM\Column(name="mesure", type="string", length=255)
     */
    private $mesure;

    /**
     * @var string
     *
     * @ORM\Column(name="url_photo", type="string", length=255)
     */
    private $urlPhoto;

    /**
     * @var string
     *
     * @ORM\Column(name="allergene", type="string", length=255)
     */
    private $allergene;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Ingredient
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nutriScore
     *
     * @param integer $nutriScore
     *
     * @return Ingredient
     */
    public function setNutriScore($nutriScore)
    {
        $this->nutriScore = $nutriScore;

        return $this;
    }

    /**
     * Get nutriScore
     *
     * @return int
     */
    public function getNutriScore()
    {
        return $this->nutriScore;
    }

    /**
     * Set mesure
     *
     * @param string $mesure
     *
     * @return Ingredient
     */
    public function setMesure($mesure)
    {
        $this->mesure = $mesure;

        return $this;
    }

    /**
     * Get mesure
     *
     * @return string
     */
    public function getMesure()
    {
        return $this->mesure;
    }

    /**
     * Set urlPhoto
     *
     * @param string $urlPhoto
     *
     * @return Ingredient
     */
    public function setUrlPhoto($urlPhoto)
    {
        $this->urlPhoto = $urlPhoto;

        return $this;
    }

    /**
     * Get urlPhoto
     *
     * @return string
     */
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }

    /**
     * Set allergene
     *
     * @param string $allergene
     *
     * @return Ingredient
     */
    public function setAllergene($allergene)
    {
        $this->allergene = $allergene;

        return $this;
    }

    /**
     * Get allergene
     *
     * @return string
     */
    public function getAllergene()
    {
        return $this->allergene;
    }
}

