<?php

declare(strict_types=1);


namespace BristolPhpTraining\PreviousPasswordChecker;


interface PreviousPasswordChecker
{

    public function isPreviousPassword(User $user, string $password): bool;
}
