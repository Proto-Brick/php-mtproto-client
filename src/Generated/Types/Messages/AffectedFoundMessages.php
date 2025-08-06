<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.affectedFoundMessages
 */
final class AffectedFoundMessages extends TlObject
{
    public const CONSTRUCTOR_ID = 0xef8d3e6c;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

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