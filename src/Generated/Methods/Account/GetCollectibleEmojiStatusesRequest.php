<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractEmojiStatuses;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getCollectibleEmojiStatuses
 */
final class GetCollectibleEmojiStatusesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2e7b4543;
    
    public string $predicate = 'account.getCollectibleEmojiStatuses';
    
    public function getMethodName(): string
    {
        return 'account.getCollectibleEmojiStatuses';
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