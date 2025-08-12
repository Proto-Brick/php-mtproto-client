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
    
    public string $predicate = 'messages.affectedFoundMessages';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::vectorOfInts($this->messages);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $pts = Deserializer::int32($stream);
        $ptsCount = Deserializer::int32($stream);
        $offset = Deserializer::int32($stream);
        $messages = Deserializer::vectorOfInts($stream);

        return new self(
            $pts,
            $ptsCount,
            $offset,
            $messages
        );
    }
}