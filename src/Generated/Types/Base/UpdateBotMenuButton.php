<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotMenuButton
 */
final class UpdateBotMenuButton extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 347625491;
    
    public string $_ = 'updateBotMenuButton';
    
    /**
     * @param int $botId
     * @param AbstractBotMenuButton $button
     */
    public function __construct(
        public readonly int $botId,
        public readonly AbstractBotMenuButton $button
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->botId);
        $buffer .= $this->button->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $botId = $deserializer->int64($stream);
        $button = AbstractBotMenuButton::deserialize($deserializer, $stream);
            return new self(
            $botId,
            $button
        );
    }
}