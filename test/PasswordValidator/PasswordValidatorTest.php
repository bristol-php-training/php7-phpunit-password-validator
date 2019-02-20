<?php

declare(strict_types=1);


namespace BristolPhpTraining\Test\PasswordValidator;

use BristolPhpTraining\PasswordValidator\PasswordValidator;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{

    public function testValidPassord(): void
    {
        $passwordStrengthCalculatorMock = new PasswordStrengthCalculatorMock('Passw0rd', 4);
        $passwordValidator = new PasswordValidator($passwordStrengthCalculatorMock);
        $this->assertTrue($passwordValidator->isValid('Passw0rd'));
        $this->assertEquals(1, $passwordStrengthCalculatorMock->getTotalCalls());
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
        $passwordValidator = new PasswordValidator(new PasswordStrengthCalculatorMock($password, 4));
        $this->assertFalse($passwordValidator->isValid($password));
    }


    public function testValidPasswordNotStrongEnough(): void
    {
        $passwordStrengthCalculatorMock = new PasswordStrengthCalculatorMock('Passw0rd', 3);
        $passwordValidator = new PasswordValidator($passwordStrengthCalculatorMock);
        $this->assertFalse($passwordValidator->isValid('Passw0rd'));
        $this->assertEquals(1, $passwordStrengthCalculatorMock->getTotalCalls());
    }
}
