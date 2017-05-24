<?php

namespace Yuzu\Awin\Tests\Units\Request;

use mageekguy\atoum;
use Yuzu\Awin\Enum\RelationshipTypeEnum;

class GetProgrammesDefinition extends atoum\test
{
    public function testConstruct()
    {
        $this
            ->given(
                $options = array(
                    'publisherId' => 'XXX'
                )
            )
            ->if($this->newTestedInstance($options))
            ->then
            ->object($this->testedInstance)->isTestedInstance()
        ;
    }

    public function testConstructWithParams()
    {
        $this
            ->given(
                $options = array(
                    'publisherId' => 'XXX',
                    'relationship' => RelationshipTypeEnum::JOINED
                )
            )
            ->if($this->newTestedInstance($options))
                ->then
                    ->object($this->testedInstance)->isTestedInstance()
        ;
    }

    public function testConstructWithWrongParams()
    {
        $this
            ->exception(
                function () {
                    $options = array(
                        'wrongParam' => 'wrongValue'
                    );
                    $this->newTestedInstance($options);
                }
            )
        ;
    }
}
