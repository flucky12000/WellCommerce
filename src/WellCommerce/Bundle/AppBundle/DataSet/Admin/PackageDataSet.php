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

namespace WellCommerce\Bundle\AppBundle\DataSet\Admin;

use Doctrine\ORM\QueryBuilder;
use WellCommerce\Bundle\CoreBundle\DataSet\AbstractDataSet;
use WellCommerce\Component\DataSet\Configurator\DataSetConfiguratorInterface;

/**
 * Class PackageDataSet
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class PackageDataSet extends AbstractDataSet
{
    public function getIdentifier(): string
    {
        return 'admin.package';
    }
    
    public function configureOptions(DataSetConfiguratorInterface $configurator)
    {
        $configurator->setColumns([
            'id'            => 'package.id',
            'name'          => 'package.name',
            'fullName'      => 'package.fullName',
            'vendor'        => 'package.vendor',
            'localVersion'  => 'package.localVersion',
            'remoteVersion' => 'package.remoteVersion',
            'createdAt'     => 'package.createdAt',
            'updatedAt'     => 'package.updatedAt',
        ]);
        
        $configurator->setColumnTransformers([
            'createdAt'     => $this->manager->createTransformer('date', ['format' => 'Y-m-d H:i:s']),
            'updatedAt'     => $this->manager->createTransformer('date', ['format' => 'Y-m-d H:i:s']),
            'localVersion'  => $this->manager->createTransformer('package_version_reference'),
            'remoteVersion' => $this->manager->createTransformer('package_version_reference'),
        ]);
    }
    
    protected function createQueryBuilder(): QueryBuilder
    {
        $queryBuilder = $this->repository->getQueryBuilder();
        $queryBuilder->groupBy('package.id');
        
        return $queryBuilder;
    }
}
