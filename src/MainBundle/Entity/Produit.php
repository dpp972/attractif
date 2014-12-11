<?php

namespace MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MainBundle\Entity\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity="Entreprise", inversedBy="produits")
     * @ORM\JoinColumn(name="idEntreprise", referencedColumnName="id")
     */
    protected $entreprise;


    /**
     * @ORM\ManyToMany(targetEntity="Categorie", inversedBy="produits")
     * @ORM\JoinTable(name="cats_product")
     */
    protected $category;

    /**
     * @ORM\ManyToMany(targetEntity="Evenement", inversedBy="produits")
     * @ORM\JoinTable(name="event_product")
     */
    protected $evenements;


    public function __construct(){
        $this->category = new ArrayCollection();
        $this->evenements = new ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Produit
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

    /**
     * Set description
     *
     * @param string $description
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add category
     *
     * @param \MainBundle\Entity\Categorie $category
     * @return Produit
     */
    public function addCategory(\MainBundle\Entity\Categorie $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \MainBundle\Entity\Categorie $category
     */
    public function removeCategory(\MainBundle\Entity\Categorie $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add evenements
     *
     * @param \MainBundle\Entity\Evenement $evenements
     * @return Produit
     */
    public function addEvenement(\MainBundle\Entity\Evenement $evenements)
    {
        $this->evenements[] = $evenements;

        return $this;
    }

    /**
     * Remove evenements
     *
     * @param \MainBundle\Entity\Evenement $evenements
     */
    public function removeEvenement(\MainBundle\Entity\Evenement $evenements)
    {
        $this->evenements->removeElement($evenements);
    }

    /**
     * Get evenements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvenements()
    {
        return $this->evenements;
    }

    /**
     * Set entreprise
     *
     * @param \MainBundle\Entity\Entreprise $entreprise
     * @return Produit
     */
    public function setEntreprise(\MainBundle\Entity\Entreprise $entreprise = null)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return \MainBundle\Entity\Entreprise 
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }
    public function __toString(){
        return $this->libelle;

    }

}
