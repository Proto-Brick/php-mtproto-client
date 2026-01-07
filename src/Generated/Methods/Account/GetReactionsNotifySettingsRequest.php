<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionsNotifySettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getReactionsNotifySettings
 */
final class GetReactionsNotifySettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6dd654c;
    
    public string $predicate = 'account.getReactionsNotifySettings';
    
    public function getMethodName(): string
    {
        return 'account.getReactionsNotifySettings';
    }
    
    public function getResponseClass(): string
    {
        return ReactionsNotifySettings::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}