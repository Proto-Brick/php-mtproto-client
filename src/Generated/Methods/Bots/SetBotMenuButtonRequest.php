<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotMenuButton;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.setBotMenuButton
 */
final class SetBotMenuButtonRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4504d54f;
    
    public string $_ = 'bots.setBotMenuButton';
    
    public function getMethodName(): string
    {
        return 'bots.setBotMenuButton';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $userId
     * @param AbstractBotMenuButton $button
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly AbstractBotMenuButton $button
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= $this->button->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}