<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputChatlistDialogFilter
 */
final class InputChatlist extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf3e0da33;
    
    public string $predicate = 'inputChatlistDialogFilter';
    
    /**
     * @param int $filterId
     */
    public function __construct(
        public readonly int $filterId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->filterId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $filterId = Deserializer::int32($stream);

        return new self(
            $filterId
        );
    }
}