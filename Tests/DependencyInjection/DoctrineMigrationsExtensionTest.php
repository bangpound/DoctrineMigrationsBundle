<?php

namespace ActiveCampaign\Bundle\MigrationsBundle\Tests\DependencyInjection;

use ActiveCampaign\Bundle\MigrationsBundle\DependencyInjection\ActiveCampaignMigrationsExtension;
use Doctrine\DBAL\Migrations\Configuration\Configuration;
use PhpUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class DoctrineMigrationsExtensionTest extends TestCase
{
    public function testOrganizeMigrations()
    {
        $container = $this->getContainer();
        $extension = new ActiveCampaignMigrationsExtension();

        $config = array(
            'organize_migrations' => 'BY_YEAR',
        );

        $extension->load(array('activecampaign_migrations' => $config), $container);

        $this->assertEquals(Configuration::VERSIONS_ORGANIZATION_BY_YEAR, $container->getParameter('activecampaign_migrations.organize_migrations'));
    }

    private function getContainer()
    {
        return new ContainerBuilder(new ParameterBag(array(
            'kernel.debug' => false,
            'kernel.bundles' => array(),
            'kernel.cache_dir' => sys_get_temp_dir(),
            'kernel.environment' => 'test',
            'kernel.root_dir' => __DIR__.'/../../', // src dir
        )));
    }
}
