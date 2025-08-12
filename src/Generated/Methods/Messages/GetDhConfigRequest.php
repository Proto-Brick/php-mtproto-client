<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractDhConfig;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getDhConfig
 */
final class GetDhConfigRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x26cf8950;
    
    public string $predicate = 'messages.getDhConfig';
    
    public function getMethodName(): string
    {
        return 'messages.getDhConfig';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDhConfig::class;
    }
    /**
     * @param int $version
     * @param int $randomLength
     */
    public function __construct(
        public readonly int $version,
        public readonly int $randomLength
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->version);
        $buffer .= Serializer::int32($this->randomLength);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}