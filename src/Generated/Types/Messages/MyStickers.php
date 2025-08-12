<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStickerSetCovered;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.myStickers
 */
final class MyStickers extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfaff629d;
    
    public string $predicate = 'messages.myStickers';
    
    /**
     * @param int $count
     * @param list<AbstractStickerSetCovered> $sets
     */
    public function __construct(
        public readonly int $count,
        public readonly array $sets
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->count);
        $buffer .= Serializer::vectorOfObjects($this->sets);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $count = Deserializer::int32($stream);
        $sets = Deserializer::vectorOfObjects($stream, [AbstractStickerSetCovered::class, 'deserialize']);

        return new self(
            $count,
            $sets
        );
    }
}