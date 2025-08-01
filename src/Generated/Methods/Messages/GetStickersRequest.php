<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractStickers;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getStickers
 */
final class GetStickersRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3584414625;
    
    public string $_ = 'messages.getStickers';
    
    public function getMethodName(): string
    {
        return 'messages.getStickers';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickers::class;
    }
    /**
     * @param string $emoticon
     * @param int $hash
     */
    public function __construct(
        public readonly string $emoticon,
        public readonly int $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->emoticon);
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}