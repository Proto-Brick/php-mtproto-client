<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\BusinessChatLinks;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getBusinessChatLinks
 */
final class GetBusinessChatLinksRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x6f70dde1;
    
    public string $predicate = 'account.getBusinessChatLinks';
    
    public function getMethodName(): string
    {
        return 'account.getBusinessChatLinks';
    }
    
    public function getResponseClass(): string
    {
        return BusinessChatLinks::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}