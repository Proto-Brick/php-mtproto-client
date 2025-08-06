<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractSavedGifs;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getSavedGifs
 */
final class GetSavedGifsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5cf09635;
    
    public string $_ = 'messages.getSavedGifs';
    
    public function getMethodName(): string
    {
        return 'messages.getSavedGifs';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedGifs::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}