<?php

declare(strict_types=1);


namespace BristolPhpTraining\Test\Processors;


use BristolPhpTraining\Processors\ItemProcessor;
use BristolPhpTraining\Processors\ListProcessor;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
    /**
     * @var ItemProcessor|MockObject
     */
    private $itemProcessor;

    /**
     * @var ListProcessor
     */
    private $listProcessor;

    public function setUp()
    {
        $this->itemProcessor = $this->getMockBuilder(ItemProcessor::class)->getMock();
        $this->listProcessor = new ListProcessor($this->itemProcessor);
    }

    public function testNeverCalled()
    {
        $this->itemProcessor
            ->expects($this->never())
            ->method("process");

        $this->listProcessor->processList([]);
    }

    public function testCalledOnce()
    {
        $this->itemProcessor
            ->expects($this->once())
            ->method("process")
        ;
        $this->listProcessor->processList(['one']);
    }

    public function testCalledOnceCheckInput()
    {
        $this->itemProcessor
            ->expects($this->once())
            ->method("process")
            ->with($this->equalTo("one"))
        ;
        $this->listProcessor->processList(['one']);
    }

    public function testCalledMultipleTimes()
    {
        $this->itemProcessor
            ->expects($this->exactly(2))
            ->method("process")
            ->withConsecutive($this->equalTo("one"), $this->equalTo("two"));

        $this->listProcessor->processList(['one', 'two']);
    }

    public function testAnyNumberOfTimes()
    {
        $this->itemProcessor
            ->expects($this->any())
            ->method("process")
            ->withConsecutive($this->equalTo("one"), $this->equalTo("two"));

        $this->listProcessor->processList(['one', 'two']);
    }

    public function testAtLeastOnce()
    {
        $this->itemProcessor
            ->expects($this->atLeast(1))
            ->method("process");

        $this->listProcessor->processList(['one', 'two']);
    }

    public function testAtMostOnce()
    {
        $this->itemProcessor
            ->expects($this->atMost(2))
            ->method("process");

        $this->listProcessor->processList(['one', 'two']);
    }


}
