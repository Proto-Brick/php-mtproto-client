<p align="center">
    <img src="https://raw.githubusercontent.com/Proto-Brick/php-mtproto-client/master/.github/img/logo.jpg" alt="Proto Brick">
</p>

<p align="center">
<a href="https://packagist.org/packages/protobrick/mtproto-client"><img src="https://img.shields.io/packagist/v/protobrick/mtproto-client?style=flat-square" alt="Latest Stable Version"></a>
<a href="https://php.net/"><img src="https://img.shields.io/badge/php-%3E%3D8.2-777bb4?style=flat-square" alt="PHP Version"></a>
<a href="https://core.telegram.org/schema"><img src="https://img.shields.io/badge/API%20Layer-195+-blueviolet?style=flat-square" alt="API Layer"></a>
<a href="./LICENSE"><img src="https://img.shields.io/badge/license-MIT-green?style=flat-square" alt="License"></a>
</p>
<h1 align="center">Proto Brick</h1>
<p>
  <strong>An async pure PHP client library for the Telegram MTProto 2.0 API, providing a solid foundation to:</strong><br><br>  
  - Build userbots with phone authentication and direct API access.<br>
  - Develop your own custom, high-level frameworks and libraries.
</p>


## 🚀Features
*   **Full Async:** Built on top of [AMPHP](https://amphp.org/) and [Revolt](https://revolt.run/) for high-performance non-blocking I/O.
*   **Strictly Typed:** 100% of the API is auto-generated from the official [TL-Schema](https://core.telegram.org/schema).
*   **Direct API Access:** 1:1 mapping of Telegram API methods (e.g., `$client->messages->sendMessage`).
*   **Pure PHP Implementation:** No requirement for the official `tdlib` binary extension. Works anywhere PHP runs.

## 📋Requirements

*   PHP 8.2+ (64-bit)
*   Extensions: `ext-zlib`, `ext-json` 
*   **Highly Recommended Extensions:**
    *   `ext-gmp` (Speeds up crypto/auth operations).
    *   `ext-openssl` (Speeds up crypto operations).
    *   `ext-uv` (Better event loop performance).

## Installation

```bash
composer require protobrick/mtproto-client
```

## Quick Start

### 1. One-time Authentication (`auth.php`)

Run this script **once** in your terminal to log in. It will interactively ask for your phone code and password, then save the session keys to the `./session` folder.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use ProtoBrick\MTProtoClient\ClientFactory;
use ProtoBrick\MTProtoClient\Settings;

// These example values won't work. You must get your own api_id and
// api_hash from https://my.telegram.org, under API Development.
$settings = new Settings(
    api_id: 12345,
    api_hash: 'your_api_hash'
);

$client = ClientFactory::create($settings, __DIR__ . '/session_name');
$auth = $client->login();

$client->"Logged in as {$auth->user->firstName}\n";
```

### Advanced Authentication
If you need to handle login programmatically (e.g., via a web form or custom logic), you can pass callables to the login method:
```php
$authorization = $client->login(
    phoneNumber: '+1234567890',
    codeProvider: function () {
        // Logic to get code (e.g., from database, API, or custom input)
        return readline("Enter code: ");
    },
    passwordProvider: function () {
        return readline("Enter 2FA Password: ");
    },
    signupProvider: function () {
        echo "Account not found. Registration required.\n";
        return [
            readline("First Name: "),
            readline("Last Name: ")
        ];
    }
);
```

### 2. Regular Usage (`bot.php`)

Now that the session is saved, you can use the client. The client will automatically load the keys from the folder.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use ProtoBrick\MTProtoClient\ClientFactory;
use ProtoBrick\MTProtoClient\Settings;

$settings = new Settings(
    api_id: 12345,
    api_hash: 'your_api_hash'
);

$client = Client::create($settings, __DIR__. '/session_name');

$client->channels->joinChannel(channel: "@ProtoBrickChat");
$client->messages->sendMessage(
    peer: "@ProtoBrickChat",
    message: 'Hello from ProtoBrick!'
);
```

## Architecture

### Generated Code
The core of this library is generated automatically:
*   **`src/Generated/Api/*.php`**: Methods grouped by namespace (`messages`, `users`, etc.).
*   **`src/Generated/Types/**/*.php`**: DTOs for every TL object (`InputPeer`, `Message`, `User`, etc.).

This ensures that if Telegram updates their API Layer, we can simply regenerate the code to support new features immediately.

### Async vs Sync
The library runs on an Event Loop (Revolt).
*   **`$client->callSync($request)`**: Blocks execution until the response arrives. Best for simple scripts.
*   **`$client->call($request)`**: Returns an `Amp\Future`. Best for high-concurrency applications.

## Advanced Configuration

You can customize the connection settings via the `Settings` object:

```php
use ProtoBrick\MTProtoClient\Transport\TransportProtocol;

$settings = new Settings(
    api_id: ...,
    api_hash: ...,
    server_address: '149.154.167.50', // Custom DC IP
    transport: TransportProtocol::PaddedIntermediate, // Obfuscation
    connect_timeout_seconds: 10
);
```

## Contributing & Support
If you find this library useful, please consider giving it a ⭐️ star! It helps the project's visibility and motivates me to keep working on it.

Contributions are welcome!
*   **Bug Reports:** Open an issue if you encounter crashes or protocol errors.
*   **Schema Updates:** If a new Layer is released, replace `schema/TL_telegram_vXXX.json` and run `php bin/build.php`.

## License

MIT License. See [LICENSE](LICENSE) for details.