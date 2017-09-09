<?php

namespace Yuzu\Awin\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * GetTransactionsDefinition
 *
 * @author Julien Devergnies <j.devergnies@outlook.com>
 */
class GetTransactionsDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('/publishers/%s/transactions?1', $this->getOptions()['publisherId']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'publisherId',
            'startDate',
            'endDate',
            'dateType',
            'timezone',
            'status'
        ]);
        $resolver->setAllowedValues('dateType', ['transaction', 'validation']);
        $resolver->setAllowedValues('timezone', ['Europe/Berlin', 'Europe/Paris', 'Europe/London', 'Europe/Dublin', 'Canada/Eastern', 'Canada/Central', 'Canada/Mountain', 'Canada/Pacific', 'US/Eastern', 'US/Central', 'US/Mountain', 'US/Pacific', 'UTC']);
        $resolver->setAllowedValues('status', ['pending', 'approved', 'declined', 'deleted']);
        $resolver->setRequired('publisherId');
    }
}
