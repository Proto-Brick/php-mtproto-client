<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputSavedStarGiftUser
 */
final class InputSavedStarGiftUser extends AbstractInputSavedStarGift
{
    public const CONSTRUCTOR_ID = 0x69279795;
    
    public string $predicate = 'inputSavedStarGiftUser';
    
    /**
     * @param int $msgId
     */
    public function __construct(
        public readonly int $msgId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->msgId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $msgId = Deserializer::int32($stream);

        return new self(
            $msgId
        );
    }
}