<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractEmojiList;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getDefaultGroupPhotoEmojis
 */
final class GetDefaultGroupPhotoEmojisRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x915860ae;
    
    public string $_ = 'account.getDefaultGroupPhotoEmojis';
    
    public function getMethodName(): string
    {
        return 'account.getDefaultGroupPhotoEmojis';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiList::class;
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