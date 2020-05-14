<?php

namespace Yuzu\Awin\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * GetReportsAdvertiserDefinition
 *
 * @author Julien Devergnies <j.devergnies@outlook.com>
 */
class GetReportsAdvertiserDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
        return sprintf('/publishers/%s/reports/advertiser', $this->getOptions()['publisherId']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'publisherId',
            'startDate',
            'endDate',
            'dateType',
            'timezone',
            'region'
        ]);
        $resolver->setAllowedValues('dateType', ['transaction', 'validation']);
        $resolver->setAllowedValues('timezone', ['Europe/Berlin', 'Europe/Paris', 'Europe/London', 'Europe/Dublin', 'Canada/Eastern', 'Canada/Central', 'Canada/Mountain', 'Canada/Pacific', 'US/Eastern', 'US/Central', 'US/Mountain', 'US/Pacific', 'UTC']);
        $resolver->setAllowedValues('region', ['AT', 'AU', 'BE', 'BR', 'CA', 'CH', 'DE', 'DK', 'ES', 'FI', 'FR', 'GB', 'IE', 'IT', 'NL', 'NO', 'PL', 'SE', 'US']);
        $resolver->setRequired('publisherId');
    }
}
