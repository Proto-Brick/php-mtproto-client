<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updateNewAuthorization
 */
final class UpdateNewAuthorization extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x8951abef;
    
    public string $predicate = 'updateNewAuthorization';
    
    /**
     * @param int $hash
     * @param true|null $unconfirmed
     * @param int|null $date
     * @param string|null $device
     * @param string|null $location
     */
    public function __construct(
        public readonly int $hash,
        public readonly ?true $unconfirmed = null,
        public readonly ?int $date = null,
        public readonly ?string $device = null,
        public readonly ?string $location = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unconfirmed) {
            $flags |= (1 << 0);
        }
        if ($this->date !== null) {
            $flags |= (1 << 0);
        }
        if ($this->device !== null) {
            $flags |= (1 << 0);
        }
        if ($this->location !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->hash);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->date);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->device);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->location);
        }
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $unconfirmed = (($flags & (1 << 0)) !== 0) ? true : null;
        $hash = Deserializer::int64($__payload, $__offset);
        $date = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($__payload, $__offset) : null;
        $device = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $location = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;

        return new self(
            $hash,
            $unconfirmed,
            $date,
            $device,
            $location
        );
    }
}