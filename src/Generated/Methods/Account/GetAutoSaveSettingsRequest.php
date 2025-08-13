<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AutoSaveSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getAutoSaveSettings
 */
final class GetAutoSaveSettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xadcbbcda;
    
    public string $predicate = 'account.getAutoSaveSettings';
    
    public function getMethodName(): string
    {
        return 'account.getAutoSaveSettings';
    }
    
    public function getResponseClass(): string
    {
        return AutoSaveSettings::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}