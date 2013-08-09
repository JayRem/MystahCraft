<?php

namespace MystahCraft\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rules
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contenus
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
     * @ORM\Column(name="valeur", type="text")
     */
    private $valeur;
    
    /**
     * @var \TypesContenus
     * 
     * @ORM\ManyToOne(targetEntity="MystahCraft\SiteBundle\Entity\TypesContenus", inversedBy="contenus")
     */
    private $type;


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
     * Set valeur
     *
     * @param string $valeur
     * @return Contenus
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    
        return $this;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set type
     *
     * @param \MystahCraft\SiteBundle\Entity\TypesContenus $type
     * @return Contenus
     */
    public function setType(\MystahCraft\SiteBundle\Entity\TypesContenus $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \MystahCraft\SiteBundle\Entity\TypesContenus 
     */
    public function getType()
    {
        return $this->type;
    }
}