<?php

declare(strict_types=1);

namespace TypistTech\WPPasswordArgonTwo;

use Codeception\TestCase\WPTestCase;

class WPSetPasswordTest extends WPTestCase
{
    /** @test */
    public function it_returns_argon2id_hashed_ciphertext()
    {
        $ciphertext = wp_set_password('password', 999);

        $this->assertFalse(
            password_needs_rehash($ciphertext, PASSWORD_ARGON2ID, WP_PASSWORD_ARGON_TWO_OPTIONS)
        );
    }

    /** @test */
    public function it_saves_argon2id_hashed_ciphertext()
    {
        $userId = wp_create_user(
            'testing_it_saves_argon2id_hashed_ciphertext',
            'old_password',
            'testing_it_saves_argon2id_hashed_ciphertext@exmaple.com'
        );

        wp_set_password('new-password', $userId);

        $user = get_user_by('id', $userId);

        $this->assertFalse(
            password_needs_rehash($user->user_pass, PASSWORD_ARGON2ID, WP_PASSWORD_ARGON_TWO_OPTIONS)
        );
    }

    /** @test */
    public function its_ciphertext_can_be_checked()
    {
        $userId = wp_create_user(
            'testing_its_ciphertext_can_be_checked',
            'old_password',
            'testing_its_ciphertext_can_be_checked@exmaple.com'
        );

        $password = 'some-password';
        $ciphertext = wp_set_password($password, $userId);
        $check = wp_check_password($password, $ciphertext);

        $this->assertTrue($check);
    }
}
