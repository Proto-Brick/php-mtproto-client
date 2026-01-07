<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AutoDownloadSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getAutoDownloadSettings
 */
final class GetAutoDownloadSettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x56da0b3f;
    
    public string $predicate = 'account.getAutoDownloadSettings';
    
    public function getMethodName(): string
    {
        return 'account.getAutoDownloadSettings';
    }
    
    public function getResponseClass(): string
    {
        return AutoDownloadSettings::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}