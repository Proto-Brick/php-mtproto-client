<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotCommandScope;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.resetBotCommands
 */
final class ResetBotCommandsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1032708345;
    
    public string $_ = 'bots.resetBotCommands';
    
    public function getMethodName(): string
    {
        return 'bots.resetBotCommands';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
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