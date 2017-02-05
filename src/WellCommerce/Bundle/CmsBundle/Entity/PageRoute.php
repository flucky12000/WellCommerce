<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\CmsBundle\Entity;

use WellCommerce\Bundle\RoutingBundle\Entity\Route;

/**
 * Class PageRoute
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class PageRoute extends Route
{
    /**
     * @var Page
     */
    protected $identifier;
    
    public function getType(): string
    {
        return 'page';
    }
}