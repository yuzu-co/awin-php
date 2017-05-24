<?php

namespace Yuzu\Awin\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * GetProgrammesDefinition
 *
 * @author Jonathan Martin <john@yuzu.co>
 */
class GetProgrammesDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('/publishers/%s/programmes?1', $this->getOptions()['publisherId']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'publisherId',
            'relationship',
            'countryCode'
        ]);
        $resolver->setAllowedValues('relationship', ['joined', 'pending', 'suspended', 'rejected', 'notjoined']);
        $resolver->setRequired('publisherId');
    }
}
