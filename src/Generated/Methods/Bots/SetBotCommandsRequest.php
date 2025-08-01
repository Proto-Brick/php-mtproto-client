<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotCommand;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotCommandScope;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.setBotCommands
 */
final class SetBotCommandsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 85399130;
    
    public string $_ = 'bots.setBotCommands';
    
    public function getMethodName(): string
    {
        return 'bots.setBotCommands';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractBotCommandScope $scope
     * @param string $langCode
     * @param list<AbstractBotCommand> $commands
     */
    public function __construct(
        public readonly AbstractBotCommandScope $scope,
        public readonly string $langCode,
        public readonly array $commands
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->scope->serialize($serializer);
        $buffer .= $serializer->bytes($this->langCode);
        $buffer .= $serializer->vectorOfObjects($this->commands);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}