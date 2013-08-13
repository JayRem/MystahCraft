<?php

namespace MystahCraft\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Group
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 */
class Group extends BaseGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var \ArrayCollection
     * @ORM\ManyToMany(targetEntity="MystahCraft\UserBundle\Entity\User", mappedBy="groups")
     */
    private $users;
    
    public function __construct($name, $roles = array())
    {
    	parent::__construct($name, $roles);
    	$this->users = new ArrayCollection();
    }
    
    public function getUsers()
    {
    	return $this->users;
    }
    
    public function addUser(MystahCraft\UserBundle\Entity\User $user)
    {
    	$this->users->add($user);
    	
    	return $this;
    }
    
    public function removeUser(MystahCraft\UserBundle\Entity\User $user)
    {
    	$this->users->removeElement($user);
    	
    	return $this;
    }
}