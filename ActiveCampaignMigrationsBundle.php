<?php


namespace ActiveCampaign\Bundle\MigrationsBundle;

use ActiveCampaign\Bundle\MigrationsBundle\DependencyInjection\ActiveCampaignMigrationsExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Bundle.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Jonathan H. Wage <jonwage@gmail.com>
 */
class ActiveCampaignMigrationsBundle extends Bundle
{
    /**
     * {@inheritdoc}
     *
     * @return ExtensionInterface
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new ActiveCampaignMigrationsExtension();
        }

        return $this->extension;
    }
}
