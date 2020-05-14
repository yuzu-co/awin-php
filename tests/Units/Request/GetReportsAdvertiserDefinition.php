<?php

namespace Yuzu\Awin\Tests\Units\Request;

use mageekguy\atoum;

class GetReportsAdvertiserDefinition extends atoum\test
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
                    'timezone' => 'Europe/Paris',
                    'startDate' => new \DateTime("-2days"),
                    'endDate' => new \DateTime("yesterday")
                )
            )
            ->if($this->newTestedInstance($options))
                ->then
                    ->object($this->testedInstance)->isTestedInstance()
        ;
    }

    

    public function testConstructWithAllParams()
    {
        $this
            ->given(
                $options = array(
                    'publisherId' => 'XXX',
                    'timezone' => 'Europe/Paris',
                    'startDate' => new \DateTime("-2days"),
                    'endDate' => new \DateTime("yesterday"),
                    'dateType' => 'validation',
                    'timezone' => 'Europe/Paris',
                    'region' => 'FR'
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

    public function testConstructWithWrongParamsValue()
    {
        $this
            ->exception(
                function () {
                    $options = array(
                        'publisherId' => 'XXX',
                        'timezone' => 'Europe/Paris',
                        'startDate' => new \DateTime("-2days"),
                        'endDate' => new \DateTime("yesterday")
                        'region' => 'wrongValue'
                    );
                    $this->newTestedInstance($options);
                }
            )
        ;
    }
}
