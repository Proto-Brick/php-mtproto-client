<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractEmojiGroups;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getEmojiProfilePhotoGroups
 */
final class GetEmojiProfilePhotoGroupsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x21a548f3;
    
    public string $predicate = 'messages.getEmojiProfilePhotoGroups';
    
    public function getMethodName(): string
    {
        return 'messages.getEmojiProfilePhotoGroups';
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