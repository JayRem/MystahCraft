<?php
namespace MystahCraft\SiteBundle\Entity;

use FOS\CommentBundle\Entity\Comment as BaseComment;
use Doctrine\ORM\Mapping as ORM;
use MystahCraft\SiteBundle\MystahCraftSiteBundle;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Comment extends BaseComment{
	
	/**
	 * @var MystahCraft\SiteBundle\Entity\Thread
	 * 
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * Thread of this comment
	 *
	 * @var Thread
	 * @ORM\ManyToOne(targetEntity="MystahCraft\SiteBundle\Entity\Thread")
	 */
	protected $thread;
}