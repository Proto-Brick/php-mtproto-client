<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/peerUser
 */
final class PeerUser extends AbstractPeer
{
    public const CONSTRUCTOR_ID = 0x59511722;
    
    public string $predicate = 'peerUser';
    
    public function getId(): int
    {
        return $this->userId;
    }
    /**
     * @param int $userId
     */
    public function __construct(
        public readonly int $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $userId = Deserializer::int64($__payload, $__offset);

        return new self(
            $userId
        );
    }
}