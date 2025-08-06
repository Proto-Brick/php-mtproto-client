<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractEmojiGroups;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getEmojiStickerGroups
 */
final class GetEmojiStickerGroupsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1dd840f5;
    
    public string $_ = 'messages.getEmojiStickerGroups';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiStickerGroups';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiGroups::class;
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
        $buffer .= $serializer->int32($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}