<?php

namespace DigitalStars\MtprotoClient\MTProto;

class MTProto {
    private string $apiId;
    private string $apiHash;
    private ?string $phoneNumber = null;
    private Session $session;
    private Connection $connection;

    public function __construct(array $settings) {
        $this->apiId = $settings['api_id'];
        $this->apiHash = $settings['api_hash'];
        $this->connection = new Connection();
        $this->session = new Session();
    }

    public function connect(): void {
        // Установка соединения с сервером
        $this->connection->connect();

        // Если есть сохраненная сессия - пробуем её использовать
        if ($this->session->exists()) {
            try {
                $this->restoreSession();
                return;
            } catch (\Exception $e) {
                // Если восстановление сессии не удалось - начинаем новую авторизацию
            }
        }
    }

    public function login(string $phoneNumber): array {
        $this->phoneNumber = $phoneNumber;

        // Отправляем запрос на получение кода
        $result = $this->connection->send('auth.sendCode', [
            'phone_number' => $phoneNumber,
            'api_id' => $this->apiId,
            'api_hash' => $this->apiHash,
            'settings' => [
                '_' => 'codeSettings'
            ]
        ]);

        return $result;
    }

    public function submitCode(string $code): array {
        // Отправляем код подтверждения
        $result = $this->connection->send('auth.signIn', [
            'phone_number' => $this->phoneNumber,
            'phone_code_hash' => $this->session->getPhoneCodeHash(),
            'phone_code' => $code
        ]);

        if (isset($result['_']) && $result['_'] === 'auth.authorizationSignUpRequired') {
            throw new \Exception('User needs to sign up');
        }

        // Если требуется 2FA
        if (isset($result['_']) && $result['_'] === 'account.password') {
            return ['2fa_required' => true, 'hint' => $result['hint'] ?? null];
        }

        $this->saveSession($result);
        return $result;
    }

    public function submit2FA(string $password): array {
        $result = $this->connection->send('auth.checkPassword', [
            'password' => $this->calculatePasswordHash($password)
        ]);

        $this->saveSession($result);
        return $result;
    }

    public function sendMessage(int $peerId, string $message): array {
        return $this->connection->send('messages.sendMessage', [
            'peer' => $peerId,
            'message' => $message,
            'random_id' => random_int(PHP_INT_MIN, PHP_INT_MAX)
        ]);
    }

    private function calculatePasswordHash(string $password): string {
        // Здесь должна быть реализация вычисления хеша пароля по алгоритму MTProto
        // Включает в себя SRP (Secure Remote Password) протокол
        return hash('sha256', $password); // Это упрощенный пример
    }

    private function saveSession(array $authResult): void {
        $this->session->save([
            'user_id' => $authResult['user']['id'],
            'access_token' => $authResult['access_token'],
            // Другие необходимые данные сессии
        ]);
    }

    private function restoreSession(): void {
        $sessionData = $this->session->load();
        // Восстановление сессии и проверка её валидности
    }
}