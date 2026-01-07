<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateGroupCallEncryptedMessage
 */
final class UpdateGroupCallEncryptedMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xc957a766;
    
    public string $predicate = 'updateGroupCallEncryptedMessage';
    
    /**
     * @param AbstractInputGroupCall $call
     * @param AbstractPeer $fromId
     * @param string $encryptedMessage
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly AbstractPeer $fromId,
        public readonly string $encryptedMessage
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= $this->fromId->serialize();
        $buffer .= Serializer::bytes($this->encryptedMessage);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $call = AbstractInputGroupCall::deserialize($__payload, $__offset);
        $fromId = AbstractPeer::deserialize($__payload, $__offset);
        $encryptedMessage = Deserializer::bytes($__payload, $__offset);

        return new self(
            $call,
            $fromId,
            $encryptedMessage
        );
    }
}