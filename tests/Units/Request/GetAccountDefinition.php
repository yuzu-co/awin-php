<?php

namespace Yuzu\Awin\Tests\Units\Request;

use mageekguy\atoum;
use Yuzu\Awin\Enum\AccountTypeEnum;

class GetAccountDefinition extends atoum\test
{
    public function testConstruct()
    {
        $this
            ->given(
                $options = array(

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
                    'type' => AccountTypeEnum::PUBLISHER
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
