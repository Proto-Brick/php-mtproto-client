<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/chatInviteImporter
 */
final class ChatInviteImporter extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8c5adfd9;
    
    public string $predicate = 'chatInviteImporter';
    
    /**
     * @param int $userId
     * @param int $date
     * @param true|null $requested
     * @param true|null $viaChatlist
     * @param string|null $about
     * @param int|null $approvedBy
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date,
        public readonly ?true $requested = null,
        public readonly ?true $viaChatlist = null,
        public readonly ?string $about = null,
        public readonly ?int $approvedBy = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requested) {
            $flags |= (1 << 0);
        }
        if ($this->viaChatlist) {
            $flags |= (1 << 3);
        }
        if ($this->about !== null) {
            $flags |= (1 << 2);
        }
        if ($this->approvedBy !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->about);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->approvedBy);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($__payload, $__offset);
        $requested = (($flags & (1 << 0)) !== 0) ? true : null;
        $viaChatlist = (($flags & (1 << 3)) !== 0) ? true : null;
        $userId = Deserializer::int64($__payload, $__offset);
        $date = Deserializer::int32($__payload, $__offset);
        $about = (($flags & (1 << 2)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $approvedBy = (($flags & (1 << 1)) !== 0) ? Deserializer::int64($__payload, $__offset) : null;

        return new self(
            $userId,
            $date,
            $requested,
            $viaChatlist,
            $about,
            $approvedBy
        );
    }
}