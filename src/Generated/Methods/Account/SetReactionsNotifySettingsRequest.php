<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\ReactionsNotifySettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.setReactionsNotifySettings
 */
final class SetReactionsNotifySettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x316ce548;
    
    public string $predicate = 'account.setReactionsNotifySettings';
    
    public function getMethodName(): string
    {
        return 'account.setReactionsNotifySettings';
    }
    
    public function getResponseClass(): string
    {
        return ReactionsNotifySettings::class;
    }
    /**
     * @param ReactionsNotifySettings $settings
     */
    public function __construct(
        public readonly ReactionsNotifySettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->settings->serialize();
        return $buffer;
    }
}