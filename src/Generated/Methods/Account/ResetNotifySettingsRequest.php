<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.resetNotifySettings
 */
final class ResetNotifySettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xdb7e1747;
    
    public string $predicate = 'account.resetNotifySettings';
    
    public function getMethodName(): string
    {
        return 'account.resetNotifySettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}