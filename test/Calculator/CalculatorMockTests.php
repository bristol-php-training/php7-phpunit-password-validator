<?php

declare(strict_types=1);


namespace BristolPhpTraining\Test\Calculator;


use BristolPhpTraining\Calculator\Calculator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CalculatorMockTests extends TestCase
{

    /**
     * @var Calculator|MockObject
     */
    private $calculator;

    public function setUp()
    {
        $this->calculator = $this->getMockBuilder(Calculator::class)->getMock();
    }

    public function testMatch1Argument()
    {
        $this->calculator
            ->expects($this->once())
            ->method("calculate")
            ->with(4, $this->anything())
        ;
        $this->calculator->calculate(4, 5);
    }

    public function testMatchMultipleArgumentsOverMultipleCalls()
    {
        $this->calculator
            ->expects($this->exactly(2))
            ->method("calculate")
            ->withConsecutive([4, $this->anything()], [6, 8]);

        $this->calculator->calculate(4, 5);
        $this->calculator->calculate(6, 8);
    }

    public function testReturningValues()
    {
        $this->calculator->expects($this->any())
            ->method("calculate")
            ->withConsecutive([4, $this->anything()], [5, 5])
            ->willReturnOnConsecutiveCalls(7, 8);

        $this->assertEquals(7, $this->calculator->calculate(4, 5));
        $this->assertEquals(8, $this->calculator->calculate(5, 5));
    }
}
