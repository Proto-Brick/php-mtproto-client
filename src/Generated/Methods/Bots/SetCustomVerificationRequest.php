<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.setCustomVerification
 */
final class SetCustomVerificationRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8b89dfbd;
    
    public string $predicate = 'bots.setCustomVerification';
    
    public function getMethodName(): string
    {
        return 'bots.setCustomVerification';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $enabled
     * @param AbstractInputUser|null $bot
     * @param string|null $customDescription
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $enabled = null,
        public readonly ?AbstractInputUser $bot = null,
        public readonly ?string $customDescription = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->enabled) {
            $flags |= (1 << 1);
        }
        if ($this->bot !== null) {
            $flags |= (1 << 0);
        }
        if ($this->customDescription !== null) {
            $flags |= (1 << 2);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->bot->serialize();
        }
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->customDescription);
        }
        return $buffer;
    }
}