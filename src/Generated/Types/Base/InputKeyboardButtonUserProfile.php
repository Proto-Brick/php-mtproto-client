<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputKeyboardButtonUserProfile
 */
final class InputKeyboardButtonUserProfile extends AbstractKeyboardButton
{
    public const CONSTRUCTOR_ID = 0xe988037b;
    
    public string $_ = 'inputKeyboardButtonUserProfile';
    
    /**
     * @param string $text
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly string $text,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->text);
        $buffer .= $this->userId->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = $deserializer->bytes($stream);
        $userId = AbstractInputUser::deserialize($deserializer, $stream);
        return new self(
            $text,
            $userId
        );
    }
}