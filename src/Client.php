<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient;

// #-- API_HANDLERS_USE_START --#
use ProtoBrick\MTProtoClient\Generated\Api\AccountMethods;
use ProtoBrick\MTProtoClient\Generated\Api\AuthMethods;
use ProtoBrick\MTProtoClient\Generated\Api\BotsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\ChannelsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\ChatlistsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\ContactsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\FoldersMethods;
use ProtoBrick\MTProtoClient\Generated\Api\FragmentMethods;
use ProtoBrick\MTProtoClient\Generated\Api\HelpMethods;
use ProtoBrick\MTProtoClient\Generated\Api\LangpackMethods;
use ProtoBrick\MTProtoClient\Generated\Api\MessagesMethods;
use ProtoBrick\MTProtoClient\Generated\Api\PaymentsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\PhoneMethods;
use ProtoBrick\MTProtoClient\Generated\Api\PhotosMethods;
use ProtoBrick\MTProtoClient\Generated\Api\PremiumMethods;
use ProtoBrick\MTProtoClient\Generated\Api\SmsjobsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\StatsMethods;
use ProtoBrick\MTProtoClient\Generated\Api\StickersMethods;
use ProtoBrick\MTProtoClient\Generated\Api\StoriesMethods;
use ProtoBrick\MTProtoClient\Generated\Api\UpdatesMethods;
use ProtoBrick\MTProtoClient\Generated\Api\UploadMethods;
use ProtoBrick\MTProtoClient\Generated\Api\UsersMethods;
// #-- API_HANDLERS_USE_END --#

use ProtoBrick\MTProtoClient\Generated\Types\Base\Message;
use ProtoBrick\MTProtoClient\Logger\ConsoleLogger;
use ProtoBrick\MTProtoClient\Logger\InternalLogger;
use ProtoBrick\MTProtoClient\Peer\Storage\FilePeerStorage;
use ProtoBrick\MTProtoClient\Session\Storage\FileSessionStorage;
use ProtoBrick\MTProtoClient\System\Process\SignalHandler;
use ProtoBrick\MTProtoClient\TL\Contracts\MessageUpdateInterface;
use ProtoBrick\MTProtoClient\TL\TlObject;
use Psr\Log\LoggerInterface;
use Amp\DeferredFuture;
use Amp\Future;
use Amp\TimeoutCancellation;
use Closure;
use ProtoBrick\MTProtoClient\Auth\Authenticator;
use ProtoBrick\MTProtoClient\Auth\Storage\AuthKeyStorage;
use ProtoBrick\MTProtoClient\Exception\RpcErrorException;
use ProtoBrick\MTProtoClient\Generated\Methods\Updates\GetStateRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Auth\Authorization;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Logger\LogChannel;
use ProtoBrick\MTProtoClient\Network\ConnectionFactory;
use ProtoBrick\MTProtoClient\Network\ConnectionManager;
use ProtoBrick\MTProtoClient\Peer\PeerManager;
use ProtoBrick\MTProtoClient\Session\Storage\SessionStorage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\Transport\Security\Obfuscator;
use Revolt\EventLoop;
use Throwable;
use ProtoBrick\MTProtoClient\Auth\Storage\FileAuthKeyStorage;
use ProtoBrick\MTProtoClient\Event\MessageContext;

/**
 * Main client class for interacting with the MTProto API.
 * Acts as a facade for the underlying networking and RPC layers.
 *
 * #-- API_HANDLERS_DOCBLOCK_START --#
 * @property-read AccountMethods $account
 * @property-read AuthMethods $auth
 * @property-read BotsMethods $bots
 * @property-read ChannelsMethods $channels
 * @property-read ChatlistsMethods $chatlists
 * @property-read ContactsMethods $contacts
 * @property-read FoldersMethods $folders
 * @property-read FragmentMethods $fragment
 * @property-read HelpMethods $help
 * @property-read LangpackMethods $langpack
 * @property-read MessagesMethods $messages
 * @property-read PaymentsMethods $payments
 * @property-read PhoneMethods $phone
 * @property-read PhotosMethods $photos
 * @property-read PremiumMethods $premium
 * @property-read SmsjobsMethods $smsjobs
 * @property-read StatsMethods $stats
 * @property-read StickersMethods $stickers
 * @property-read StoriesMethods $stories
 * @property-read UpdatesMethods $updates
 * @property-read UploadMethods $upload
 * @property-read UsersMethods $users
 * #-- API_HANDLERS_DOCBLOCK_END --#
 */
class Client
{
    // #-- API_HANDLERS_PROPERTIES_START --#
    public readonly AccountMethods $account;
    public readonly AuthMethods $auth;
    public readonly BotsMethods $bots;
    public readonly ChannelsMethods $channels;
    public readonly ChatlistsMethods $chatlists;
    public readonly ContactsMethods $contacts;
    public readonly FoldersMethods $folders;
    public readonly FragmentMethods $fragment;
    public readonly HelpMethods $help;
    public readonly LangpackMethods $langpack;
    public readonly MessagesMethods $messages;
    public readonly PaymentsMethods $payments;
    public readonly PhoneMethods $phone;
    public readonly PhotosMethods $photos;
    public readonly PremiumMethods $premium;
    public readonly SmsjobsMethods $smsjobs;
    public readonly StatsMethods $stats;
    public readonly StickersMethods $stickers;
    public readonly StoriesMethods $stories;
    public readonly UpdatesMethods $updates;
    public readonly UploadMethods $upload;
    public readonly UsersMethods $users;

    #-- API_HANDLERS_PROPERTIES_END --#

    private ConnectionManager $connectionManager;

    /** @var Closure(TlObject):void|null */
    private ?Closure $updateCallback = null;
    /** @var Closure(MessageContext):void|null */
    private ?Closure $messageCallback = null;
    /** @var Closure(MessageContext):void|null */
    private ?Closure $messageEditCallback = null;
    /** @var Closure(MessageServiceContext):void|null */
    private ?Closure $serviceMessageCallback = null;
    private ?DeferredFuture $stopSignal = null;
    private ?string $saveTimerId = null;

    public ?object $me = null;

    public function __construct(
        private readonly Settings $settings,
        AuthKeyStorage $authKeyStorage,
        public readonly PeerManager $peerManager,
        private readonly SessionStorage $sessionStorage,
        private readonly LoggerInterface $logger
    ) {
        $this->peerManager->setClient($this);

        // Initialize Networking Stack
        // The Obfuscator handles the handshake encryption (Obfuscated2)
        $obfuscator = new Obfuscator();

        $factory = new ConnectionFactory(
            $settings,
            $authKeyStorage,
            $sessionStorage,
            $obfuscator,
            $peerManager,
            $this->logger
        );

        // The Manager routes requests to the correct connection
        $this->connectionManager = new ConnectionManager($factory, $this->settings->dc_id, $this->logger);

        $this->connectionManager->setOnUpdateHandler(function ($update) {
            if ($this->updateCallback) {
                ($this->updateCallback)($update);
            }
            if ($this->messageCallback || $this->messageEditCallback) {
                $this->dispatchMessageEvent($update);
            }
        });

        $this->connectionManager->getMainConnection()->onReconnect = function () {
            $this->logger->info("Connection restored. Syncing state...", ['channel' => LogChannel::APP]);
            $this->call(new GetStateRequest())->ignore();
        };

        // Initialize API Handlers (Generated code)
        // #-- API_HANDLERS_INIT_START --#
        $this->account = new AccountMethods($this);
        $this->auth = new AuthMethods($this);
        $this->bots = new BotsMethods($this);
        $this->channels = new ChannelsMethods($this);
        $this->chatlists = new ChatlistsMethods($this);
        $this->contacts = new ContactsMethods($this);
        $this->folders = new FoldersMethods($this);
        $this->fragment = new FragmentMethods($this);
        $this->help = new HelpMethods($this);
        $this->langpack = new LangpackMethods($this);
        $this->messages = new MessagesMethods($this);
        $this->payments = new PaymentsMethods($this);
        $this->phone = new PhoneMethods($this);
        $this->photos = new PhotosMethods($this);
        $this->premium = new PremiumMethods($this);
        $this->smsjobs = new SmsjobsMethods($this);
        $this->stats = new StatsMethods($this);
        $this->stickers = new StickersMethods($this);
        $this->stories = new StoriesMethods($this);
        $this->updates = new UpdatesMethods($this);
        $this->upload = new UploadMethods($this);
        $this->users = new UsersMethods($this);
        #-- API_HANDLERS_INIT_END --#
    }

    public static function create(
        Settings $settings,
        string $storagePath = './session',
        ?LoggerInterface $logger = null
    ): Client {
        // Ensure storage directory exists
        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0777, true);
        }

        // Initialize persistent storage
        // Note: FileAuthKeyStorage currently stores only one key.
        // In the future, it should support storing keys per DC ID (e.g. auth_dc2.key).
        $authKeyStorage = new FileAuthKeyStorage($storagePath . '/auth.key');

        $peerStorage = new FilePeerStorage($storagePath . '/peers.json');
        $peerManager = new PeerManager($peerStorage);

        $internalLogger = new InternalLogger(
            $logger ?? new ConsoleLogger($settings->logger_level),
            $settings->logger_channels
        );

        $sessionStorage = new FileSessionStorage($storagePath);

        // We no longer need to manually instantiate Transport, Crypto, Session, etc.
        // The Client internals (ConnectionManager) handle this based on Settings.
        return new self(
            $settings,
            $authKeyStorage,
            $peerManager,
            $sessionStorage,
            $internalLogger
        );
    }

    /**
     * Connects to the main Data Center.
     * This method blocks until the connection is established or fails.
     */
    public function connect(): void
    {
        // This awaits the async connection process synchronously for the user convenience
        $this->connectionManager->getMainConnection()->connect()->await();
    }

    /**
     * @throws Throwable
     */
    public function start(): void
    {
        $this->connect();

        try {
            $this->help->getConfig();

            $users = $this->users->getUsers([new InputUserSelf()]);
            if (!empty($users) && isset($users[0])) {
                $this->me = $users[0];
                $this->logger->info(
                    "Logged in as: " . ($this->me->username ?? $this->me->id),
                    ['channel' => LogChannel::APP]
                );
            }
            $this->updates->getState();
        } catch (Throwable $e) {
            $this->logger->error("Startup sync failed: " . $e->getMessage(), ['channel' => LogChannel::APP]);
            throw $e;
        }

        // 3. Инициализация состояния обновлений (PTS/QTS)
        // В новой архитектуре это может делать UpdatesManager, но оставим явный вызов
        // $this->updates->manager->sync();

        $this->startPeriodicSave();

        $signalHandler = new SignalHandler();

        $signalHandler->onShutdown(function () {
            $this->logger->info("Received stop signal. Initiating graceful shutdown...", ['channel' => LogChannel::APP]
            );
            $this->stop();
        });

        $driver = EventLoop::getDriver();
        $driverName = (new \ReflectionClass($driver))->getShortName();

        if (PHP_OS_FAMILY === 'Windows') {
            //fix graceful shutdown
            EventLoop::repeat(0.5, static function () {
            });
        }

        $this->logger->info(
            "Client started. Event loop driver: {$driverName}. Press Ctrl+C to stop.",
            ['channel' => LogChannel::APP]
        );

        if ($driverName !== 'UvDriver') {
            $this->logger->notice(
                "Suggestion: Install 'ext-uv' for better performance in production",
                ['channel' => LogChannel::APP]
            );
        }

        if ($this->stopSignal) {
            return;
        }

        $this->stopSignal = new DeferredFuture();

        try {
            $this->stopSignal->getFuture()->await();
        } finally {
            $this->stopSignal = null;
        }
    }

    /**
     * Останавливает работу клиента, разрывает соединения и разблокирует метод start().
     */
    public function stop(): void
    {
        if ($this->saveTimerId) {
            EventLoop::cancel($this->saveTimerId);
            $this->saveTimerId = null;
        }

        $this->saveSession();
        $this->connectionManager->close();

        if ($this->stopSignal && !$this->stopSignal->isComplete()) {
            $this->stopSignal->complete();
        }
    }

    /**
     * Easy Mode: Subscribe to new messages only.
     * Automatically handles ShortMessage, NewMessage, and ChannelMessage wrappers.
     *
     * @param callable(Message):void $callback
     */
    public function onMessage(callable $callback): void
    {
        $this->messageCallback = $callback(...);
    }

    /**
     * Subscribe to message edits.
     * Triggers when a message is edited in private chats, groups, or channels.
     *
     * @param callable(Message):void $callback
     */
    public function onMessageEdit(callable $callback): void
    {
        $this->messageEditCallback = $callback(...);
    }

    public function onServiceMessage(callable $callback): void
    {
        $this->serviceMessageCallback = $callback(...);
    }

    private function dispatchMessageEvent(object $update): void
    {
        // 1. Проверяем, реализует ли апдейт наш контракт "MessageUpdate"
        if ($update instanceof MessageUpdateInterface) {
            $abstractMessage = $update->toFullMessage($this->me?->id ?? 0);

            if ($abstractMessage instanceof MessageService) {
                if ($this->serviceMessageCallback) {
                    ($this->serviceMessageCallback)($abstractMessage);
                }
            }
            // 3. Отсекаем сервисные сообщения (вступление в группу, пин сообщения и т.д.)
            // Нам нужны только обычные (текст/медиа).
            // Если тебе нужны и сервисные, убери эту проверку или сделай отдельный коллбэк.
            if (!($abstractMessage instanceof Message)) {
                return;
            }

            // 4. Маршрутизация (Новое или Правка)
            $ctx = new MessageContext($this, $abstractMessage);

            if ($update->isEdit()) {
                if ($this->messageEditCallback) {
                    ($this->messageEditCallback)($ctx);
                }
            } else {
                if ($this->messageCallback) {
                    ($this->messageCallback)($ctx);
                }
            }
        }
    }

    private function startPeriodicSave(): void
    {
        if ($this->saveTimerId) {
            return;
        }

        // Сохраняем каждые 10 секунд (можно реже)
        $this->saveTimerId = EventLoop::repeat(30, function () {
            $this->saveSession();
        });
    }

    public function saveSession(): void
    {
        // Получаем соединение с основным DC
        // (Для поддержки мульти-DC нужно пробегаться по всем активным соединениям)
        try {
            $conn = $this->connectionManager->getMainConnection();
            $state = $conn->getSessionState();
            $this->sessionStorage->setFor($conn->authKey->id, $state->toArray());
            $this->logger->debug('Сохранил сессию', ['channel' => LogChannel::STORAGE]);
        } catch (Throwable $e) {
        }
    }

    /**
     * Sends an asynchronous RPC request.
     *
     * @param RpcRequest $request The request object
     * @return Future Resolves with the response object or fails with RpcErrorException
     */
    public function call(RpcRequest $request): Future
    {
        // Delegate to ConnectionManager which handles routing (Multi-DC)
        return $this->connectionManager->call($request);
    }

    /**
     * Sends a synchronous RPC request (blocks execution).
     *
     * @param RpcRequest $request The request object
     * @param int $timeout Timeout in seconds
     * @return mixed The response object
     */
    public function callSync(RpcRequest $request, int $timeout = 30): mixed
    {
        return $this->call($request)->await(new TimeoutCancellation($timeout));
    }

    /**
     * Returns the current client settings.
     */
    public function getSettings(): Settings
    {
        return $this->settings;
    }

    /**
     * Устанавливает обработчик входящих обновлений (сообщений).
     * @param callable(object $update):void $callback
     */
    public function onUpdate(callable $callback): void
    {
        $this->updateCallback = $callback(...);
    }

    /**
     * Performs an interactive login.
     * If arguments are missing, prompts the user via CLI (STDIN).
     *
     * @param string|null $phoneNumber Phone number in international format (e.g. "+1234567890").
     * @param callable|null $codeProvider Optional custom code provider. Defaults to reading from STDIN.
     * @param callable|null $passwordProvider Optional 2FA password provider. Defaults to reading from STDIN.
     * @param callable|null $signupProvider Optional registration provider. Defaults to reading First/Last name from STDIN.
     * @throws RpcErrorException
     */
    public function login(
        ?string $phoneNumber = null,
        ?callable $codeProvider = null,
        ?callable $passwordProvider = null,
        ?callable $signupProvider = null
    ): Authorization {
        $this->connect();

        if ($phoneNumber === null) {
            echo "Enter phone number: ";
            $input = fgets(STDIN);
            if ($input === false) {
                throw new \RuntimeException("Failed to read input");
            }
            $phoneNumber = trim($input);
            if ($phoneNumber === '') {
                throw new \InvalidArgumentException("Phone number cannot be empty");
            }
        }

        $codeProvider ??= static function (): string {
            echo "Enter code: ";
            $line = fgets(STDIN);
            return $line ? trim($line) : '';
        };

        $passwordProvider ??= static function (): string {
            echo "Enter 2FA password: ";
            $line = fgets(STDIN);
            return $line ? trim($line) : '';
        };

        $signupProvider ??= static function (): array {
            echo "Account not found. Registration required.\n";
            echo "Enter First Name: ";
            $first = trim((string)fgets(STDIN));
            echo "Enter Last Name (optional): ";
            $last = trim((string)fgets(STDIN));
            return [$first, $last];
        };

        return (new Authenticator($this))->login(
            $phoneNumber,
            $codeProvider,
            $passwordProvider,
            $signupProvider
        );
    }
}