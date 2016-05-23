<?php

namespace Udec\HomeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UdecHomeBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
