<?php

namespace Yuzu\Awin\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * GetProgrammeDetailDefinition
 *
 * @author Jonathan Martin <john@yuzu.co>
 */
class GetProgrammeDetailDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf(
            '/publishers/%s/programmedetails?advertiserId=%s',
            $this->getOptions()['publisherId'],
            $this->getOptions()['advertiserId']
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'publisherId',
            'advertiserId'
        ]);
        $resolver->setRequired(['publisherId', 'advertiserId']);
    }
}
