<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/sendAsPeer
 */
final class SendAsPeer extends TlObject
{
    public const CONSTRUCTOR_ID = 0xb81c7034;
    
    public string $predicate = 'sendAsPeer';
    
    /**
     * @param AbstractPeer $peer
     * @param true|null $premiumRequired
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly ?true $premiumRequired = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->premiumRequired) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $premiumRequired = (($flags & (1 << 0)) !== 0) ? true : null;
        $peer = AbstractPeer::deserialize($__payload, $__offset);

        return new self(
            $peer,
            $premiumRequired
        );
    }
}