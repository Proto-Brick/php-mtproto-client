<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inlineBotSwitchPM
 */
final class InlineBotSwitchPM extends AbstractInlineBotSwitchPM
{
    public const CONSTRUCTOR_ID = 1008755359;
    
    public string $_ = 'inlineBotSwitchPM';
    
    /**
     * @param string $text
     * @param string $startParam
     */
    public function __construct(
        public readonly string $text,
        public readonly string $startParam
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->text);
        $buffer .= $serializer->bytes($this->startParam);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $text = $deserializer->bytes($stream);
        $startParam = $deserializer->bytes($stream);
            return new self(
            $text,
            $startParam
        );
    }
}