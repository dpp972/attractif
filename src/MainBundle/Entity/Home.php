<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Home
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MainBundle\Entity\HomeRepository")
 */
class Home
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
     * @ORM\Column(name="slogan", type="string", length=255)
     */
    private $slogan;

    /**
     * @var string
     *
     * @ORM\Column(name="help", type="text")
     */
    private $help;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=511)
     */
    private $adresse;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="nomSociete", type="string", length=255)
     */
    private $nomSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="text")
     */
    private $presentation;


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
     * Set slogan
     *
     * @param string $slogan
     * @return Home
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * Get slogan
     *
     * @return string 
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set help
     *
     * @param string $help
     * @return Home
     */
    public function setHelp($help)
    {
        $this->help = $help;

        return $this;
    }

    /**
     * Get help
     *
     * @return string 
     */
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Home
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nomSociete
     *
     * @param string $nomSociete
     * @return Home
     */
    public function setNomSociete($nomSociete)
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    /**
     * Get nomSociete
     *
     * @return string 
     */
    public function getNomSociete()
    {
        return $this->nomSociete;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Home
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     * @return Home
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string 
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Home
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
}
