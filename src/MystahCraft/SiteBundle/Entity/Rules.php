<?php

namespace MystahCraft\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rules
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Rules
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
     * @ORM\Column(name="regle", type="text")
     */
    private $regle;


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
     * Set regles
     *
     * @param string $regles
     * @return Rules
     */
    public function setRegle($regle)
    {
        $this->regle = $regle;
    
        return $this;
    }

    /**
     * Get regles
     *
     * @return string 
     */
    public function getRegle()
    {
        return $this->regle;
    }
}
