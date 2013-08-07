<?php

namespace MystahCraft\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MystahCraftUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
