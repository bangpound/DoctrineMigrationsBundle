<?php

namespace ActiveCampaign\Bundle\MigrationsBundle\Tests\DependencyInjection;

use ActiveCampaign\Bundle\MigrationsBundle\Command\DoctrineCommand;
use Doctrine\DBAL\Migrations\Configuration\Configuration;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class DoctrineCommandTest extends \PHPUnit\Framework\TestCase
{
    public function testConfigureMigrations()
    {
        $configurationMock = $this->getMockBuilder('Doctrine\DBAL\Migrations\Configuration\Configuration')
            ->disableOriginalConstructor()
            ->getMock();

        $configurationMock->expects($this->once())
            ->method('getMigrations')
            ->willReturn(array());

        DoctrineCommand::configureMigrations($this->getContainer(), $configurationMock);
    }

    private function getContainer()
    {
        return new ContainerBuilder(new ParameterBag(array(
            'activecampaign_migrations.dir_name' => __DIR__.'/../../',
            'activecampaign_migrations.namespace' => 'test',
            'activecampaign_migrations.name' => 'test',
            'activecampaign_migrations.table_name' => 'test',
            'activecampaign_migrations.organize_migrations' => Configuration::VERSIONS_ORGANIZATION_BY_YEAR,
            'activecampaign_migrations.custom_template' => null,
        )));
    }
}
