<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientEvenementProduit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MainBundle\Entity\ClientEvenementProduitRepository")
 */
class ClientEvenementProduit
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
     * ORM\OneToOne(targetEntity="Produit")
     */
    private $idProduit;

    /**
     * ORM\OneToOne(targetEntity="Evenement")
     */
    private $idEvenement;

    /**
     * ORM\OneToOne(targetEntity="Client")
     */
    private $idClient;


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
     * Set idProduit
     *
     * @param integer $idProduit
     * @return ClientEvenementProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get idProduit
     *
     * @return integer 
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * Set idEvenement
     *
     * @param integer $idEvenement
     * @return ClientEvenementProduit
     */
    public function setIdEvenement($idEvenement)
    {
        $this->idEvenement = $idEvenement;

        return $this;
    }

    /**
     * Get idEvenement
     *
     * @return integer 
     */
    public function getIdEvenement()
    {
        return $this->idEvenement;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     * @return ClientEvenementProduit
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return integer 
     */
    public function getIdClient()
    {
        return $this->idClient;
    }
}
