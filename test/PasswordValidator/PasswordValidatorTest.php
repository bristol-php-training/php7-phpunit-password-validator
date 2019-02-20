<?php

declare(strict_types=1);


namespace BristolPhpTraining\Test\PasswordValidator;

use BristolPhpTraining\PasswordStrengthCalculator\PasswordStrengthCalculatorInterface;
use BristolPhpTraining\PasswordValidator\PasswordValidator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{

    /**
     * @var PasswordStrengthCalculatorInterface|MockObject $passwordStrengthCalculatorMock
     */
    private $passwordStrengthCalculatorMock;

    /**
     * @var PasswordValidator
     */
    private $passwordValidator;

    protected function setUp(): void
    {
        $this->passwordStrengthCalculatorMock = $this->getMockBuilder(PasswordStrengthCalculatorInterface::class)->getMock();
        $this->passwordValidator = new PasswordValidator($this->passwordStrengthCalculatorMock);
    }

    public function testValidPassword(): void
    {
        $this->assertTrue($this->passwordValidator->isValid('Passw0rd'));
    }


    public function invalidPasswordProvider(): array
    {
        return [
            'tooShort' => ['Passw0r'],
            'noDigits' => ['Password'],
            'noLowerCase' => ['PASSW0RD'],
            'noUpperCase' => ['passw0rd'],
        ];
    }


    /**
     * @dataProvider invalidPasswordProvider
     */
    public function testInvalidPassword(string $password): void
    {
        $this->assertFalse($this->passwordValidator->isValid($password));
    }
}
