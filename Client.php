<?php declare(strict_types=1);

namespace DigitalStars\MtprotoClient;

use DigitalStars\MtprotoClient\Auth\AuthKey;
use DigitalStars\MtprotoClient\Auth\AuthKeyCreator;
use DigitalStars\MtprotoClient\Auth\Storage\AuthKeyStorage;
use DigitalStars\MtprotoClient\Session\Session;
use DigitalStars\MtprotoClient\Transport\Transport;

/**
 * Главный фасадный класс. Единственная точка входа для пользователя.
 */
class Client
{
    private ?AuthKey $authKey = null;

    public function __construct(
        private readonly Settings $settings,
        private readonly AuthKeyStorage $authKeyStorage,
        private readonly Session $session,
        private readonly Transport $transport,
        private readonly AuthKeyCreator $authKeyCreator,
        private readonly MessagePacker $messagePacker,
        // ... другие зависимости
    ) {}

    /**
     * Устанавливает соединение и получает/создает ключ авторизации.
     */
    public function connect(): void
    {
        // TODO:
        // 1. Открыть сетевое соединение через $this->transport->connect().
        // 2. Попробовать загрузить ключ из $this->authKeyStorage->get().
        // 3. Если ключа нет, создать его через $this->authKeyCreator->create().
        // 4. Сохранить новый ключ через $this->authKeyStorage->set(...).
        // 5. Сохранить ключ в свойстве $this->authKey.
        // 6. Инициализировать сессию $this->session->start(...).
    }

    /**
     * Выполняет вызов метода Telegram API.
     * @param string $method Имя метода, например 'help.getConfig'.
     * @param array $params Параметры метода.
     * @return array Результат вызова.
     */
    public function call(string $method, array $params = []): array
    {
        // TODO:
        // 1. Упаковать и зашифровать сообщение через $this->messagePacker->pack(...).
        // 2. Отправить бинарные данные через $this->transport->send(...).
        // 3. Получить ответ через $this->transport->receive(...).
        // 4. Распаковать и расшифровать ответ (обратный процесс в MessagePacker/Aes).
        // 5. Десериализовать TL-объект ответа.
        // 6. Вернуть результат в виде массива.
        return [];
    }
}