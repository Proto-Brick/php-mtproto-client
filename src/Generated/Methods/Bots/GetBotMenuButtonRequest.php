<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotMenuButton;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.getBotMenuButton
 */
final class GetBotMenuButtonRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9c60eb28;
    
    public string $predicate = 'bots.getBotMenuButton';
    
    public function getMethodName(): string
    {
        return 'bots.getBotMenuButton';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBotMenuButton::class;
    }
    /**
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}