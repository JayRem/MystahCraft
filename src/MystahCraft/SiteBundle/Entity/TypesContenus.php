<?php

namespace MystahCraft\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypesContenus
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TypesContenus
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
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;

    /**
     * @var \ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="MystahCraft\SiteBundle\Entity\Contenus", mappedBy="type", cascade={"persist"})
     */
    private $contenus;

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
     * Set type
     *
     * @param string $type
     * @return TypesContenus
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contenus = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add contenus
     *
     * @param \MystahCraft\SiteBundle\Entity\Contenus $contenus
     * @return TypesContenus
     */
    public function addContenu(\MystahCraft\SiteBundle\Entity\Contenus $contenus)
    {
        $this->contenus[] = $contenus;
    
        return $this;
    }

    /**
     * Remove contenus
     *
     * @param \MystahCraft\SiteBundle\Entity\Contenus $contenus
     */
    public function removeContenu(\MystahCraft\SiteBundle\Entity\Contenus $contenus)
    {
        $this->contenus->removeElement($contenus);
    }

    /**
     * Get contenus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContenus()
    {
        return $this->contenus;
    }
}