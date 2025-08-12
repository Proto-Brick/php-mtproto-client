<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractFeaturedStickers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getFeaturedStickers
 */
final class GetFeaturedStickersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x64780b14;
    
    public string $predicate = 'messages.getFeaturedStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getFeaturedStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractFeaturedStickers::class;
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
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}