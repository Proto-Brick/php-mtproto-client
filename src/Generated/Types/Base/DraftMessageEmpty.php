<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/draftMessageEmpty
 */
final class DraftMessageEmpty extends AbstractDraftMessage
{
    public const CONSTRUCTOR_ID = 0x1b0c841a;
    
    public string $predicate = 'draftMessageEmpty';
    
    /**
     * @param int|null $date
     */
    public function __construct(
        public readonly ?int $date = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->date !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->date);
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $date = (($flags & (1 << 0)) !== 0) ? Deserializer::int32($stream) : null;

        return new self(
            $date
        );
    }
}