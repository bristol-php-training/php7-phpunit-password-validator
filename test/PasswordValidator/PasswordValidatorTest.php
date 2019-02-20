<?php

declare(strict_types=1);


namespace BristolPhpTraining\Test\PasswordValidator;

use BristolPhpTraining\PasswordStrengthCalculator\PasswordStrengthCalculatorInterface;
use BristolPhpTraining\PasswordValidator\PasswordValidator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{
    const PASSW0RD = 'Passw0rd';

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
        $this->passwordStrengthCalculatorMock
            ->expects($this->once())
            ->method('getPasswordStrength')
            ->with($this->equalTo(self::PASSW0RD))
            ->willReturn(4);
        $this->assertTrue($this->passwordValidator->isValid(self::PASSW0RD));
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
        $this->passwordStrengthCalculatorMock
            ->method('getPasswordStrength')
            ->willReturn(4);
        $this->assertFalse($this->passwordValidator->isValid($password));
    }


    public function testWeakPassword(): void
    {
        $this->passwordStrengthCalculatorMock
            ->expects($this->once())
            ->method('getPasswordStrength')
            ->with($this->equalTo(self::PASSW0RD))
            ->willReturn(3);

        $this->assertFalse($this->passwordValidator->isValid(self::PASSW0RD));
    }

}
