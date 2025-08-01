<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotCommand;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotCommandScope;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.getBotCommands
 */
final class GetBotCommandsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3813412310;
    
    public string $_ = 'bots.getBotCommands';
    
    public function getMethodName(): string
    {
        return 'bots.getBotCommands';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBotCommand::class;
    }
    /**
     * @param AbstractBotCommandScope $scope
     * @param string $langCode
     */
    public function __construct(
        public readonly AbstractBotCommandScope $scope,
        public readonly string $langCode
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->scope->serialize($serializer);
        $buffer .= $serializer->bytes($this->langCode);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}