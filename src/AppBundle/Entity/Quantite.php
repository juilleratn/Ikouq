<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne as ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;

/**
 * Quantite
 *
 * @ORM\Table(name="quantite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuantiteRepository")
 */
class Quantite
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
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @ManyToOne(targetEntity="Recette")
     * @JoinColumn(name="fk_recette", referencedColumnName="id")
     */
    private $fk_recette;

    /**
     * @ManyToOne(targetEntity="Ingredient")
     * @JoinColumn(name="fk_ingredient", referencedColumnName="id")
     */
    private $fk_ingredient;


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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @return mixed
     */
    public function getFkIngredient()
    {
        return $this->fk_ingredient;
    }

    /**
     * @param mixed $fk_ingredient
     */
    public function setFkIngredient($fk_ingredient): void
    {
        $this->fk_ingredient = $fk_ingredient;
    }

    /**
     * @param mixed $fk_recette
     */
    public function setFkRecette($fk_recette): void
    {
        $this->fk_recette = $fk_recette;
    }

    /**
     * @return mixed
     */
    public function getFkRecette()
    {
        return $this->fk_recette;
    }

    public function __toString()
    {
        $format = "%s,%s,%s";
        return sprintf($format, $this->fk_recette, $this->fk_ingredient, $this->quantite);
    }
}

