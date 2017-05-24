<?php

namespace Yuzu\Awin\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * GetAccountDefinition
 *
 * @author Jonathan Martin <john@yuzu.co>
 */
class GetAccountDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('/accounts?1');
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'type'
        ]);
        $resolver->setAllowedValues('type', ['publisher', 'advertiser']);
    }
}
