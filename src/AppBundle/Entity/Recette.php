<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recette
 *
 * @ORM\Table(name="recette")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecetteRepository")
 */
class Recette
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
     * @ORM\Column(name="part", type="integer")
     */
    private $part;

    /**
     * @var string
     *
     * @ORM\Column(name="url_photo", type="string", length=255)
     */
    private $urlPhoto;

    /**
     * @var int
     *
     * @ORM\Column(name="thermostat", type="integer")
     */
    private $thermostat;

    /**
     * @var int
     *
     * @ORM\Column(name="temps_cuisson", type="integer")
     */
    private $tempsCuisson;

    /**
     * @var string
     *
     * @ORM\Column(name="regime", type="string", length=255)
     */
    private $regime;

    /**
     * @var string
     *
     * @ORM\Column(name="plat", type="string", length=255)
     */
    private $plat;

    /**
     * @var string
     *
     * @ORM\Column(name="instruction", type="text")
     */
    private $instruction;


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
     * @return Recette
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
     * Set part
     *
     * @param integer $part
     *
     * @return Recette
     */
    public function setPart($part)
    {
        $this->part = $part;

        return $this;
    }

    /**
     * Get part
     *
     * @return int
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Set urlPhoto
     *
     * @param string $urlPhoto
     *
     * @return Recette
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
     * Set thermostat
     *
     * @param integer $thermostat
     *
     * @return Recette
     */
    public function setThermostat($thermostat)
    {
        $this->thermostat = $thermostat;

        return $this;
    }

    /**
     * Get thermostat
     *
     * @return int
     */
    public function getThermostat()
    {
        return $this->thermostat;
    }

    /**
     * Set tempsCuisson
     *
     * @param integer $tempsCuisson
     *
     * @return Recette
     */
    public function setTempsCuisson($tempsCuisson)
    {
        $this->tempsCuisson = $tempsCuisson;

        return $this;
    }

    /**
     * Get tempsCuisson
     *
     * @return int
     */
    public function getTempsCuisson()
    {
        return $this->tempsCuisson;
    }

    /**
     * Set regime
     *
     * @param string $regime
     *
     * @return Recette
     */
    public function setRegime($regime)
    {
        $this->regime = $regime;

        return $this;
    }

    /**
     * Get regime
     *
     * @return string
     */
    public function getRegime()
    {
        return $this->regime;
    }

    /**
     * Set plat
     *
     * @param string $plat
     *
     * @return Recette
     */
    public function setPlat($plat)
    {
        $this->plat = $plat;

        return $this;
    }

    /**
     * Get plat
     *
     * @return string
     */
    public function getPlat()
    {
        return $this->plat;
    }

    /**
     * Set instruction
     *
     * @param string $instruction
     *
     * @return Recette
     */
    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;

        return $this;
    }

    /**
     * Get instruction
     *
     * @return string
     */
    public function getInstruction()
    {
        return $this->instruction;
    }
}

