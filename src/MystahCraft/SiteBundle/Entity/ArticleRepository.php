<?php
namespace MystahCraft\SiteBundle\Entity;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


class ArticleRepository extends EntityRepository{
	public function getArticles($nbParPage, $page)
	{
		$qb = $this->createQueryBuilder('a');
		
		$query = $qb	->orderBy('a.datePubli', 'DESC')
						->where('a.active = true')->getQuery();
		
		$query	->setFirstResult(($page - 1) * $nbParPage)
				->setMaxResults($nbParPage);
		
		return new Paginator($query);
	}
}