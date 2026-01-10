<p align="center">
    <img src="https://raw.githubusercontent.com/Proto-Brick/php-mtproto-client/master/.github/img/logo.jpg" alt="Proto Brick">
</p>

<p align="center">
<a href="https://packagist.org/packages/protobrick/mtproto-client"><img src="https://img.shields.io/packagist/v/protobrick/mtproto-client?style=flat-square" alt="Latest Stable Version"></a>
<a href="https://php.net/"><img src="https://img.shields.io/badge/php-%3E%3D8.2-777bb4?style=flat-square" alt="PHP Version"></a>
<a href="https://core.telegram.org/schema"><img src="https://img.shields.io/badge/API%20Layer-220-blueviolet?style=flat-square" alt="API Layer"></a>
<a href="./LICENSE"><img src="https://img.shields.io/badge/license-MIT-green?style=flat-square" alt="License"></a>
</p>
<h1 align="center">Proto Brick</h1>
<p>
  <strong>An async pure PHP client library for the Telegram MTProto 2.0 API, providing a solid foundation to:</strong><br><br>  
  - Build userbots with phone authentication and direct API access.<br>
</p>


## 🚀Features
*   **Full Async:** Built on top of [AMPHP](https://amphp.org/) and [Revolt](https://revolt.run/) for high-performance non-blocking I/O.
*   **Pure PHP Implementation:** No requirement for the official `tdlib` binary extension. Works anywhere PHP runs.
*   **Strictly Typed:** 100% of the API is auto-generated from the official [TL-Schema](https://core.telegram.org/schema).
*   **Direct API Access:** 1:1 mapping of Telegram API methods (e.g., `$client->messages->sendMessage`).
*   **Smart Peer Management:** Automatically handles `access_hash` and resolves `@usernames` or `IDs` via local cache.
*   **Advanced Logging:** Native colorized console output with channel filtering, fully compatible with PSR-3

## 📋Requirements

*   PHP 8.2+ (64-bit)
*   Required Extensions: `ext-zlib`, `ext-json` 
*   **Highly Recommended Extensions:**
    *   `ext-gmp` (Speeds up crypto/auth operations).
    *   `ext-openssl` (Speeds up crypto operations).
    *   `ext-uv` (Better event loop performance).

## Installation

```bash
composer require protobrick/mtproto-client
```

## Authentication

### Interactive Login (CLI)

Run **once** to log in. It prompts for credentials (phone, code, 2FA) and saves the session locally.
```php
<?php //auth.php
require __DIR__ . '/vendor/autoload.php';

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Settings;

// Get your api_id and api_hash from https://my.telegram.org
$settings = new Settings(
    api_id: 12345,
    api_hash: 'your_api_hash'
);

// Session files will be stored in 'session_name' folder
$client = Client::create($settings, __DIR__ . '/session_name');
$auth = $client->login();

echo "Logged in as {$auth->user->firstName}\n";
```

### Custom Flow
If you need to handle login programmatically (e.g., from database, API, or custom input), pass callables
```php
$auth = $client->login(
    phoneNumber: '+1234567890',
    codeProvider: fn() => readline("Code: "),      // Or fetch from DB/API
    passwordProvider: fn() => readline("2FA: "),   // Or fetch from DB/API
    signupProvider: fn() => [readline("Name: "), readline("Last Name: ")]
);
```

## Calling API Methods

Use this for simple scripts (e.g., cron jobs) where you need to perform an action and exit.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Settings;

$settings = new Settings(api_id: 12345, api_hash: 'hash');
$client = Client::create($settings, __DIR__. '/session_name');

$client->channels->joinChannel(channel: "@ProtoBrickChat");
$client->messages->sendMessage(
    peer: "@ProtoBrickChat",
    message: 'Hello from ProtoBrick!'
);
```

## Handling Updates

Use the Event Loop to build bots or tools that react to events in real-time.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Settings;
use ProtoBrick\MTProtoClient\Event\MessageContext;
use ProtoBrick\MTProtoClient\Event\ServiceMessageContext;
// Import specific TL types if you need raw checks
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageActionChatCreate;
use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageMediaPhoto;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UpdateUserTyping;
use ProtoBrick\MTProtoClient\TL\TlObject;

$settings = new Settings(api_id: 12345, api_hash: 'hash');
$client = Client::create($settings, __DIR__. '/session_name');

// Handle New Messages
$client->onMessage(function (MessageContext $ctx) {
    // Ignore own messages
    if ($ctx->isOutgoing()) return;

    // High-level helpers
    // (See src/Event/MessageContext.php & AbstractMessageContext.php)
    if ($ctx->getText() === '/ping') {
        $ctx->reply("Pong! 🏓");
        $ctx->react('👍');
        return;
    }

    // Low-level access
    // Check for media types, via_bot_id, reply_markup, etc. directly
    if ($ctx->message->media instanceof MessageMediaPhoto) {
        echo "Received a photo with caption: " . $ctx->getText();
    }
});

// Handle Edited Messages
$client->onMessageEdit(function (MessageContext $ctx) {
    echo "EDIT in chat {$ctx->getChatId()}: {$ctx->getText()}\n";
});

// Handle Service Messages (Joins, Leaves, Title Changes)
$client->onServiceMessage(function (ServiceMessageContext $ctx) {
    // High-level helpers
    // (See src/Event/ServiceMessageContext.php & AbstractMessageContext.php)
    if ($ctx->isTitleChanged()) {
        echo "Chat {$ctx->getChatId()} renamed to: {$ctx->getNewTitle()}\n";
    }
    
    // Low-level access
    // Handle specific actions that don't have wrappers yet
    if ($ctx->message->action instanceof MessageActionChatCreate) {
        echo "Group created with title: " . $ctx->message->action->title;
    }
});

// Handle Raw Updates (Typing, Status, Read Receipts)
$client->onUpdate(function (TlObject $update) {
    // Catches ALL updates flowing from the server
    if ($update instanceof UpdateUserTyping) {
        echo "User {$update->userId} is typing...\n";
    }
});

// Start the Event Loop (Blocks execution)
$client->start();
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

## ⚠️ Disclaimer
This library is for educational purposes. Using userbots may violate Telegram's Terms of Service. Use responsibly.

## Contributing & Support
If you find this library useful, please consider giving it a ⭐️ star! It helps the project's visibility and motivates me to keep working on it.

Contributions are welcome!
*   **Bug Reports:** Open an issue if you encounter crashes or protocol errors.
*   **Schema Updates:** If a new Layer is released, replace `schema/TL_telegram_vXXX.json` and run `php bin/build.php`.

## License

MIT License. See [LICENSE](LICENSE) for details.