<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.setBotUpdatesStatus
 */
final class SetBotUpdatesStatusRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xec22cfcd;
    
    public string $_ = 'help.setBotUpdatesStatus';
    
    public function getMethodName(): string
    {
        return 'help.setBotUpdatesStatus';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $pendingUpdatesCount
     * @param string $message
     */
    public function __construct(
        public readonly int $pendingUpdatesCount,
        public readonly string $message
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->pendingUpdatesCount);
        $buffer .= $serializer->bytes($this->message);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}