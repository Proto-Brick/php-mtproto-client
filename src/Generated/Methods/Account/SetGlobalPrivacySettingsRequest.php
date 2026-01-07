<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\GlobalPrivacySettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.setGlobalPrivacySettings
 */
final class SetGlobalPrivacySettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1edaaac2;
    
    public string $predicate = 'account.setGlobalPrivacySettings';
    
    public function getMethodName(): string
    {
        return 'account.setGlobalPrivacySettings';
    }
    
    public function getResponseClass(): string
    {
        return GlobalPrivacySettings::class;
    }
    /**
     * @param GlobalPrivacySettings $settings
     */
    public function __construct(
        public readonly GlobalPrivacySettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->settings->serialize();
        return $buffer;
    }
}