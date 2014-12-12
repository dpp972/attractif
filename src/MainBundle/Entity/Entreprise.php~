<?php

namespace MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MainBundle\Entity\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=255)
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;


    /**
     * ORM\OneToMany(targetEntity="Produit", mappedBy="entreprise")
     */
    protected $produits;

    public function __construct(){
        $this->produits = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set siret
     *
     * @param string $siret
     * @return Entreprise
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return string 
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Entreprise
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    public function __toString(){
        return $this->libelle;
    }
}
