<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\GlobalPrivacySettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getGlobalPrivacySettings
 */
final class GetGlobalPrivacySettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xeb2b4cf6;
    
    public string $predicate = 'account.getGlobalPrivacySettings';
    
    public function getMethodName(): string
    {
        return 'account.getGlobalPrivacySettings';
    }
    
    public function getResponseClass(): string
    {
        return GlobalPrivacySettings::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}