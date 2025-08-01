<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputChatlistDialogFilter
 */
final class InputChatlistDialogFilter extends AbstractInputChatlist
{
    public const CONSTRUCTOR_ID = 4091599411;
    
    public string $_ = 'inputChatlistDialogFilter';
    
    /**
     * @param int $filterId
     */
    public function __construct(
        public readonly int $filterId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->filterId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $filterId = $deserializer->int32($stream);
            return new self(
            $filterId
        );
    }
}