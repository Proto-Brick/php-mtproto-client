<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputNotifyPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputPeerNotifySettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateNotifySettings
 */
final class UpdateNotifySettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x84be5b93;
    
    public string $predicate = 'account.updateNotifySettings';
    
    public function getMethodName(): string
    {
        return 'account.updateNotifySettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputNotifyPeer $peer
     * @param InputPeerNotifySettings $settings
     */
    public function __construct(
        public readonly AbstractInputNotifyPeer $peer,
        public readonly InputPeerNotifySettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->settings->serialize();
        return $buffer;
    }
}