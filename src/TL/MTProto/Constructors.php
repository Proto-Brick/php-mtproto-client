<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\TL\MTProto;

/**
 * Справочник ID для MTProto-конструкторов.
 * Хранит "магические числа" в виде именованных констант для улучшения читаемости.
 * @see https://core.telegram.org/schema/mtproto
 */
final class Constructors
{
    // --- Запросы для создания ключа авторизации ---
    public const REQ_PQ_MULTI = 0xbe7e8ef1;
    public const P_Q_INNER_DATA_DC = 0xa9f55f95; // Имя немного сокращено для удобства
    public const REQ_DH_PARAMS = 0xd712e4be;
    public const SET_CLIENT_DH_PARAMS = 0xf5045f1f;
    public const CLIENT_DH_INNER_DATA = 0x6643b654;

    // --- Ответы ---
    public const RES_PQ = 0x05162463;
    public const SERVER_DH_PARAMS_OK = 0xd0e8075c;
    public const SERVER_DH_INNER_DATA = 0xb5890dba;
    public const DH_GEN_OK = 0x3bcbf734;
    public const DH_GEN_RETRY = 0x4679b65f;
    public const DH_GEN_FAIL = 0xa69dae02;

    // --- Сервисные сообщения ---
    public const RPC_RESULT = 0xf35c6d01;
    public const RPC_ERROR = 0x2144ca19;
    public const MSG_CONTAINER = 0x73f1f8dc;

    public const MSGS_ACK = 0x62d6b459;

    // --- Вектор (универсальный конструктор) ---
    public const VECTOR = 0x1cb5c415;

    public const GZIP_PACKED = 0x3072cfa1;
}
