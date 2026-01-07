<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputNotifyPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getNotifyExceptions
 */
final class GetNotifyExceptionsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x53577479;
    
    public string $predicate = 'account.getNotifyExceptions';
    
    public function getMethodName(): string
    {
        return 'account.getNotifyExceptions';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param true|null $compareSound
     * @param true|null $compareStories
     * @param AbstractInputNotifyPeer|null $peer
     */
    public function __construct(
        public readonly ?true $compareSound = null,
        public readonly ?true $compareStories = null,
        public readonly ?AbstractInputNotifyPeer $peer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->compareSound) {
            $flags |= (1 << 1);
        }
        if ($this->compareStories) {
            $flags |= (1 << 2);
        }
        if ($this->peer !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->peer->serialize();
        }
        return $buffer;
    }
}