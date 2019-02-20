<?php

declare(strict_types=1);


namespace BristolPhpTraining\Test\PasswordValidator;


use BristolPhpTraining\PasswordStrengthCalculator\PasswordStrengthCalculatorInterface;
use PHPUnit\Framework\Assert;

class PasswordStrengthCalculatorMock implements PasswordStrengthCalculatorInterface
{

    /**
     * @var string
     */
    private $expectedPassword;

    /**
     * @var int
     */
    private $strength;

    /**
     * @var int
     */
    private $totalCalls;

    /**
     * PasswordStrengthCalculatorMock constructor.
     * @param string $expectedPassword
     * @param int $strength
     */
    public function __construct(string $expectedPassword, int $strength)
    {
        $this->expectedPassword = $expectedPassword;
        $this->strength = $strength;
        $this->totalCalls = 0;
    }


    /**
     * Returns a score for password strength. 0 is weak. 5 is strong.
     *
     * @param string $password
     * @return int
     */
    public function getPasswordStrength(string $password): int
    {
        $this->totalCalls++;
        Assert::assertEquals($this->expectedPassword, $password);
        return $this->strength;
    }

    /**
     * @return string
     */
    public function getExpectedPassword(): string
    {
        return $this->expectedPassword;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getTotalCalls(): int
    {
        return $this->totalCalls;
    }


}
