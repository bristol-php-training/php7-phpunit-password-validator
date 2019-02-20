<?php

declare(strict_types=1);


namespace BristolPhpTraining\Processors;


interface ItemProcessor
{

    public function process($item): void;
}
