<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputQuickReplyShortcut
 */
final class InputQuickReplyShortcut extends AbstractInputQuickReplyShortcut
{
    public const CONSTRUCTOR_ID = 0x24596d41;
    
    public string $_ = 'inputQuickReplyShortcut';
    
    /**
     * @param string $shortcut
     */
    public function __construct(
        public readonly string $shortcut
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->shortcut);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $shortcut = Deserializer::bytes($stream);
        return new self(
            $shortcut
        );
    }
}