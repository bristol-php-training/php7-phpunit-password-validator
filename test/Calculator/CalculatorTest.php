<?php

declare(strict_types=1);

namespace BristolPhpTraining\Test\Calculator;

use BristolPhpTraining\Calculator\Calculator;
use InvalidArgumentException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @var Calculator|MockObject
     */
    private $calculator;


    public function setUp()
    {
        $this->calculator = $this->getMockBuilder(Calculator::class)->getMock();
    }

    public function testReturnSameAnswerEveryTime()
    {
        $this->calculator->method("calculate")->willReturn(7);
        $this->assertEquals(7, $this->calculator->calculate(1, 2));
        $this->assertEquals(7, $this->calculator->calculate(3, 4));
        $this->assertEquals(7, $this->calculator->calculate(6, 7));
    }

    public function testReturnDifferentAnswerEachTime()
    {
        $this->calculator->method("calculate")->willReturnOnConsecutiveCalls(3, 5, 4);
        $this->assertEquals(3, $this->calculator->calculate(1, 2));
        $this->assertEquals(5, $this->calculator->calculate(3, 4));
        $this->assertEquals(4, $this->calculator->calculate(6, 7));

        // Would fail as null should be returned
        //$this->assertEquals(null, $this->calculator->calculate(4, 7));
    }

    public function testReturnFirstArgument()
    {
        $this->calculator->method("calculate")->willReturnArgument(0);
        $this->assertEquals(1, $this->calculator->calculate(1, 2));
        $this->assertEquals(3, $this->calculator->calculate(3, 4));
    }

    public function testReturnSecondArgument()
    {
        $this->calculator->method("calculate")->willReturnArgument(1);
        $this->assertEquals(2, $this->calculator->calculate(1, 2));
        $this->assertEquals(4, $this->calculator->calculate(3, 4));
    }

    public function testReturnCallback()
    {
        $this->calculator->method("calculate")->willReturnCallback(
            function ($a, $b) {
                return $a + $b;
            }
        );
        $this->assertEquals(3, $this->calculator->calculate(1, 2));
        $this->assertEquals(7, $this->calculator->calculate(3, 4));
    }

    public function testReturnMap()
    {
        $mapping = [
            [1, 2, 8],
            [3, 4, 5],
        ];
        $this->calculator->method("calculate")->willReturnMap($mapping);
        $this->assertEquals(8, $this->calculator->calculate(1, 2));
        $this->assertEquals(5, $this->calculator->calculate(3, 4));

        // Would fail as null would be returned
        //$this->assertEquals(null, $this->calculator->calculate(3, 8));
    }

    public function testThrowException()
    {
        $this->calculator->method("calculate")->willThrowException(new InvalidArgumentException("Invalid", 40));

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid");
        $this->expectExceptionCode(40);
        $this->calculator->calculate(1, 2);
    }
}
