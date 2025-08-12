<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.affectedMessages
 */
final class AffectedMessages extends TlObject
{
    public const CONSTRUCTOR_ID = 0x84d19185;
    
    public string $predicate = 'messages.affectedMessages';
    
    /**
     * @param int $pts
     * @param int $ptsCount
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $ptsCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->pts);
        $buffer .= Serializer::int32($this->ptsCount);

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

        return new self(
            $pts,
            $ptsCount
        );
    }
}