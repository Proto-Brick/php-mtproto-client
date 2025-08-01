<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Fragment;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCollectible;
use DigitalStars\MtprotoClient\Generated\Types\Fragment\AbstractCollectibleInfo;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/fragment.getCollectibleInfo
 */
final class GetCollectibleInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3189671354;
    
    public string $_ = 'fragment.getCollectibleInfo';
    
    public function getMethodName(): string
    {
        return 'fragment.getCollectibleInfo';
    }
    
    public function getResponseClass(): string
    {
        return AbstractCollectibleInfo::class;
    }
    /**
     * @param AbstractInputCollectible $collectible
     */
    public function __construct(
        public readonly AbstractInputCollectible $collectible
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->collectible->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}