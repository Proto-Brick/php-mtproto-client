<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractMyStickers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getMyStickers
 */
final class GetMyStickersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3501580796;
    
    public string $_ = 'messages.getMyStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getMyStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMyStickers::class;
    }
    /**
     * @param int $offsetId
     * @param int $limit
     */
    public function __construct(
        public readonly int $offsetId,
        public readonly int $limit
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->offsetId);
        $buffer .= $serializer->int32($this->limit);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}