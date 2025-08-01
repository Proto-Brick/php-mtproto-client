<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractConnectedBots;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getConnectedBots
 */
final class GetConnectedBotsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1319421967;
    
    public string $_ = 'account.getConnectedBots';
    
    public function getMethodName(): string
    {
        return 'account.getConnectedBots';
    }
    
    public function getResponseClass(): string
    {
        return AbstractConnectedBots::class;
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