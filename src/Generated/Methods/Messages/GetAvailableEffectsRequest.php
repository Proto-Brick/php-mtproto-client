<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractAvailableEffects;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getAvailableEffects
 */
final class GetAvailableEffectsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdea20a39;
    
    public string $predicate = 'messages.getAvailableEffects';
    
    public function getMethodName(): string
    {
        return 'messages.getAvailableEffects';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAvailableEffects::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}