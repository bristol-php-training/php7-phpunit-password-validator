<?php

declare(strict_types=1);


namespace BristolPhpTraining\Processors;


class ListProcessor
{

    /**
     * @var ItemProcessor
     */
    private $itemProcessor;

    public function __construct(ItemProcessor $itemProcessor)
    {
        $this->itemProcessor = $itemProcessor;
    }


    public function processList(array $items): void
    {
        foreach ($items as $item) {
            $this->itemProcessor->process($item);
        }
    }
}
