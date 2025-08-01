<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.affectedFoundMessages
 */
final class AffectedFoundMessages extends AbstractAffectedFoundMessages
{
    public const CONSTRUCTOR_ID = 4019011180;
    
    public string $_ = 'messages.affectedFoundMessages';
    
    /**
     * @param int $pts
     * @param int $ptsCount
     * @param int $offset
     * @param list<int> $messages
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $ptsCount,
        public readonly int $offset,
        public readonly array $messages
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->pts);
        $buffer .= $serializer->int32($this->ptsCount);
        $buffer .= $serializer->int32($this->offset);
        $buffer .= $serializer->vectorOfInts($this->messages);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $pts = $deserializer->int32($stream);
        $ptsCount = $deserializer->int32($stream);
        $offset = $deserializer->int32($stream);
        $messages = $deserializer->vectorOfInts($stream);
            return new self(
            $pts,
            $ptsCount,
            $offset,
            $messages
        );
    }
}