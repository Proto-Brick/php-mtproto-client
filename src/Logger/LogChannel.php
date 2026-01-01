<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Logger;

enum LogChannel: string
{
    case APP = 'app';
    case NET = 'net';       // Сеть (подключения, разрывы)
    case AUTH = 'auth';     // Авторизация
    case SESSION = 'session'; // Состояние сессии
    case STORAGE = 'storage';
    case RPC = 'rpc';       // API запросы
    case CRYPTO = 'crypto'; // Шифрование (шумный)
    case PEER = 'peer';     // Работа с сущностями
    case SERVICE = 'service';
    case UPDATE = 'update';
}