<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Stories;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/stories.canSendStoryCount
 */
final class CanSendStoryCount extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc387c04e;
    
    public string $predicate = 'stories.canSendStoryCount';
    
    /**
     * @param int $countRemains
     */
    public function __construct(
        public readonly int $countRemains
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->countRemains);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $countRemains = Deserializer::int32($stream);

        return new self(
            $countRemains
        );
    }
}