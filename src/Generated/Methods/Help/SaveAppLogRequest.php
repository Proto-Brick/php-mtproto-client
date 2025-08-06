<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputAppEvent;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.saveAppLog
 */
final class SaveAppLogRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6f02f748;
    
    public string $_ = 'help.saveAppLog';
    
    public function getMethodName(): string
    {
        return 'help.saveAppLog';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<InputAppEvent> $events
     */
    public function __construct(
        public readonly array $events
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->events);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}