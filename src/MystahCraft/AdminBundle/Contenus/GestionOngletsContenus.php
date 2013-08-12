<?php
namespace MystahCraft\AdminBundle\Contenus;

use Doctrine\ORM\EntityManager;

class GestionOngletsContenus extends \Twig_Extension{
	private $em;
	
	public function __construct(EntityManager $manager)
	{
		$this->em = $manager;
	}
	
	/**
	 * @return array Les types de contenus disponibles
	 */
	public function getTypesContenus()
	{
		return $this->em->getRepository('MystahCraftSiteBundle:TypesContenus')->findAll();		
	}
	
	public function getFunctions()
	{
		return array(
			'typesContenusList' => new \Twig_Function_Method($this, 'getTypesContenus')
		);
	}
	
	public function getName()
	{
		return 'GestionOngletContenus';
	}
}