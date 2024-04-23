<?php

declare(strict_types=1);

namespace TypistTech\WPPasswordArgonTwo;

use Codeception\TestCase\WPTestCase;

class ValidatorTest extends WPTestCase
{
    private const DUMMY_PEPPER = 'dummy_pepper';
    private const DUMMY_PASSWORD = 'pa5$word';
    private const DUMMY_CIPHERTEXT = '$argon2id$v=19$m=1024,t=2,p=2$YW9PZlgyenZ3Ymd1enlhVA$mTdimtDV2xr0N4LxkxignExKDXHas/kLIkKfUz18ks0';

    /** @test */
    public function it_implements_password_validator_interface()
    {
        $validator = new Validator(self::DUMMY_PEPPER);

        $this->assertInstanceOf(ValidatorInterface::class, $validator);
    }

    /** @test */
    public function it_checks_correct_password()
    {
        $validator = new Validator(self::DUMMY_PEPPER);

        $isValid = $validator->isValid(self::DUMMY_PASSWORD, self::DUMMY_CIPHERTEXT);

        $this->assertTrue($isValid);
    }

    /** @test */
    public function it_checks_incorrect_password()
    {
        $validator = new Validator(self::DUMMY_PEPPER);

        $isValid = $validator->isValid('incorrect password', self::DUMMY_CIPHERTEXT);

        $this->assertFalse($isValid);
    }
}
