<?php
namespace MystahCraft\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use MystahCraft\UserBundle\Entity\Group;

class LoadUsersData implements FixtureInterface, ContainerAwareInterface {
	
	private $container;
	
	public function load(ObjectManager $manager) 
	{
		/*
		 * Groups
		 */
		
		$groupAdmin = new Group('admins');
		$groupAdmin->addRole('ROLE_SUPER_ADMIN');
		$manager->persist($groupAdmin);
		
		
		/*
		 * Users
		 */
		
		$userManager = $this->container->get('fos_user.user_manager');
		
		
		//KenshiWado
		$kenshiWado = $userManager->createUser();
		$kenshiWado->setUsername('KenshiWado');
		$kenshiWado->setEmail('jrm.safont@gmail.com');
		$kenshiWado->setPlainPassword('kenshi1337');
		$kenshiWado->addGroup($groupAdmin);
		$kenshiWado->setEnabled(1);
		
		$userManager->updateUser($kenshiWado);
	}
	public function setContainer(ContainerInterface $container = null) 
	{
		$this->container = $container;
	}

}
