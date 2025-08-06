<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractEmojiStatuses;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getDefaultEmojiStatuses
 */
final class GetDefaultEmojiStatusesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd6753386;
    
    public string $_ = 'account.getDefaultEmojiStatuses';
    
    public function getMethodName(): string
    {
        return 'account.getDefaultEmojiStatuses';
    }
    
    public function getResponseClass(): string
    {
        return AbstractEmojiStatuses::class;
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