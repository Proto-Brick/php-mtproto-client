<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatOnlines
 */
final class ChatOnlines extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf041e250;
    
    public string $predicate = 'chatOnlines';
    
    /**
     * @param int $onlines
     */
    public function __construct(
        public readonly int $onlines
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->onlines);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $onlines = Deserializer::int32($stream);

        return new self(
            $onlines
        );
    }
}