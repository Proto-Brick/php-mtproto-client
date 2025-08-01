<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messageRange
 */
final class MessageRange extends AbstractMessageRange
{
    public const CONSTRUCTOR_ID = 182649427;
    
    public string $_ = 'messageRange';
    
    /**
     * @param int $minId
     * @param int $maxId
     */
    public function __construct(
        public readonly int $minId,
        public readonly int $maxId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->minId);
        $buffer .= $serializer->int32($this->maxId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $minId = $deserializer->int32($stream);
        $maxId = $deserializer->int32($stream);
            return new self(
            $minId,
            $maxId
        );
    }
}