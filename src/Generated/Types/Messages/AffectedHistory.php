<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.affectedHistory
 */
final class AffectedHistory extends AbstractAffectedHistory
{
    public const CONSTRUCTOR_ID = 3025955281;
    
    public string $_ = 'messages.affectedHistory';
    
    /**
     * @param int $pts
     * @param int $ptsCount
     * @param int $offset
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly int $offset
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        $buffer .= $serializer->int32($this->offset);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
        $offset = $deserializer->int32($stream);
            return new self(
            $pts,
            $ptsCount,
            $offset
        );
    }
}