<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient;

use DigitalStars\MtprotoClient\Auth\AuthKey;
use DigitalStars\MtprotoClient\Auth\AuthKeyCreator;
use DigitalStars\MtprotoClient\Auth\Storage\AuthKeyStorage;
use DigitalStars\MtprotoClient\Session\Session;
use DigitalStars\MtprotoClient\Transport\Transport;

class Client
{
    private ?AuthKey $authKey = null;

    public function __construct(
        private readonly Settings $settings,
        private readonly AuthKeyStorage $authKeyStorage,
        private readonly Session $session,
        private readonly Transport $transport,
        private readonly AuthKeyCreator $authKeyCreator,
        private readonly MessagePacker $messagePacker
    ) {}

    public function connect(): void
    {
        $this->transport->connect();
        $this->authKey = $this->authKeyStorage->get();

        if ($this->authKey === null) {
            echo "AuthKey not found. Creating a new one...\n";
            $this->authKey = $this->authKeyCreator->create();
            $this->authKeyStorage->set($this->authKey);
            echo "New AuthKey created and saved.\n";
        } else {
            echo "AuthKey loaded from storage.\n";
        }

        $this->session->start($this->authKey);
    }

    public function call(string $method, array $params = []): array
    {
        if ($this->authKey === null) {
            throw new \LogicException("Cannot make API calls without a valid connection. Did you forget to call connect()?");
        }

        // 1. Сериализовать $method и $params в бинарный payload.
        // ЭТО САМАЯ СЛОЖНАЯ ЧАСТЬ. Она требует наличия сгенерированных классов для API.
        // Пока что, предположим, у нас есть некий сериализатор, который это делает.
        // Например, для help.getConfig (constructor 0xc4f9186b)
        if ($method === 'help.getConfig') {
            // Для этого нужен TL\Serializer, который может сериализовать объекты.
            // Либо мы делаем это вручную:
            $payload = pack('V', 0xc4f9186b);
        } else {
            throw new \InvalidArgumentException("Method '$method' is not implemented yet.");
        }

        // 2. Упаковать и зашифровать payload
        $request = $this->messagePacker->packEncrypted($payload, $this->authKey);

        // 3. Отправить результат через транспорт
        $this->transport->send($request);

        // 4. Получить ответ
        $rawResponse = $this->transport->receive();

        // 5. Распаковать ответ
        $responsePayload = $this->messagePacker->unpackEncrypted($rawResponse, $this->authKey);

        // 6. Десериализовать бинарный ответ в PHP-массив/объект.
        // Опять же, это требует полной TL-системы.
        // TODO: Десериализовать $responsePayload и вернуть результат.

        // Временная заглушка, чтобы видеть, что мы получаем
        echo "Decrypted response payload (hex): " . bin2hex($responsePayload) . "\n";

        return [];
    }
}