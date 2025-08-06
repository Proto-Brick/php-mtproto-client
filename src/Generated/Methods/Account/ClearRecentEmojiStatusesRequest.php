<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.clearRecentEmojiStatuses
 */
final class ClearRecentEmojiStatusesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x18201aae;
    
    public string $_ = 'account.clearRecentEmojiStatuses';
    
    public function getMethodName(): string
    {
        return 'account.clearRecentEmojiStatuses';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}