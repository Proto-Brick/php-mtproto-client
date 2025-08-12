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
    public const CONSTRUCTOR_ID = 0x14b85813;
    
    public string $predicate = 'updateBotMenuButton';
    
    /**
     * @param int $botId
     * @param AbstractBotMenuButton $button
     */
    public function __construct(
        public readonly int $botId,
        public readonly AbstractBotMenuButton $button
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->botId);
        $buffer .= $this->button->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $botId = Deserializer::int64($stream);
        $button = AbstractBotMenuButton::deserialize($stream);

        return new self(
            $botId,
            $button
        );
    }
}