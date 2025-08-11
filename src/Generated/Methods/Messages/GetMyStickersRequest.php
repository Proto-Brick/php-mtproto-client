<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\MyStickers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getMyStickers
 */
final class GetMyStickersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd0b5e1fc;
    
    public string $_ = 'messages.getMyStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getMyStickers';
    }
    
    public function getResponseClass(): string
    {
        return MyStickers::class;
    }
    /**
     * @param int $offsetId
     * @param int $limit
     */
    public function __construct(
        public readonly int $offsetId,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->offsetId);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}