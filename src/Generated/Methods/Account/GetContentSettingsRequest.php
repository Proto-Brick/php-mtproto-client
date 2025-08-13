<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\ContentSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getContentSettings
 */
final class GetContentSettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8b9b4dae;
    
    public string $predicate = 'account.getContentSettings';
    
    public function getMethodName(): string
    {
        return 'account.getContentSettings';
    }
    
    public function getResponseClass(): string
    {
        return ContentSettings::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}