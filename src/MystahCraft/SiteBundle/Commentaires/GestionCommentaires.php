<?php
namespace MystahCraft\SiteBundle\Commentaires;


use Doctrine\ORM\EntityManager;
class GestionCommentaires extends  \Twig_Extension{
	
	private $em;
	
	public function __construct(EntityManager $manager)
	{
		$this->em = $manager;
	}
	
	public function getNombreCommentaires($idThread)
	{
		$thread = $this->em->getRepository('MystahCraftSiteBundle:Thread')->find($idThread);
		if($thread != null)
		{
			return $thread->getNumComments() . " commentaire" . (($thread->getNumComments() > 1) ? "s" : "");
		}
		else
		{
			return "0 commentaire";
		}
	}
	
	
	/* (non-PHPdoc)
	 * @see Twig_Extension::getFunctions()
	 */
	public function getFunctions() {
		return array(
			'nbCommentaires' => new \Twig_Function_Method($this, 'getNombreCommentaires')
		);
	}

	
	/* (non-PHPdoc)
	 * @see Twig_ExtensionInterface::getName()
	 */
	public function getName() {
		return 'GestionCommentaires';
	}


}