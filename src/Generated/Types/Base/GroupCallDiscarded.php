<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/groupCallDiscarded
 */
final class GroupCallDiscarded extends AbstractGroupCall
{
    public const CONSTRUCTOR_ID = 0x7780bcb4;
    
    public string $_ = 'groupCallDiscarded';
    
    /**
     * @param int $id
     * @param int $accessHash
     * @param int $duration
     */
    public function __construct(
        public readonly int $id,
        public readonly int $accessHash,
        public readonly int $duration
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->id);
        $buffer .= Serializer::int64($this->accessHash);
        $buffer .= Serializer::int32($this->duration);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $id = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);
        $duration = Deserializer::int32($stream);
        return new self(
            $id,
            $accessHash,
            $duration
        );
    }
}