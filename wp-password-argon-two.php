<?php
/**
 * Plugin Name: WP Password Argon2id
 * Plugin URI:  https://joaodath.com.br
 * Description: Securely store WordPress user passwords in database with Argon2id hashing and SHA-512 HMAC using PHP's native functions.
 * Author:      @joaodath
 * Author URI:  https://joaodath.com.br
 * Version:     0.2.2
 * Licence:     MIT
 */

declare(strict_types=1);

// Installing as a must-use plugin is the last resort.
// You should use composer autoload whenever possible.

// Order matters.
require_once __DIR__ . '/src/ValidatorInterface.php';
require_once __DIR__ . '/src/Validator.php';
require_once __DIR__ . '/src/PhpassValidator.php';
require_once __DIR__ . '/src/MDFiveValidator.php';
require_once __DIR__ . '/src/PasswordLock.php';
require_once __DIR__ . '/src/Manager.php';
require_once __DIR__ . '/src/ManagerFactory.php';
require_once __DIR__ . '/src/pluggable.php';
