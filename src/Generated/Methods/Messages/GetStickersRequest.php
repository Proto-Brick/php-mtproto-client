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
    public const CONSTRUCTOR_ID = 0xd5a5d3a1;
    
    public string $predicate = 'messages.getStickers';
    
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->emoticon);
        $buffer .= Serializer::int64($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}