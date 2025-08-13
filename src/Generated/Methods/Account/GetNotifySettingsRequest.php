<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputNotifyPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\PeerNotifySettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getNotifySettings
 */
final class GetNotifySettingsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x12b3ad31;
    
    public string $predicate = 'account.getNotifySettings';
    
    public function getMethodName(): string
    {
        return 'account.getNotifySettings';
    }
    
    public function getResponseClass(): string
    {
        return PeerNotifySettings::class;
    }
    /**
     * @param AbstractInputNotifyPeer $peer
     */
    public function __construct(
        public readonly AbstractInputNotifyPeer $peer
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
}