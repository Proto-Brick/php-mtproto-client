<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\ConnectedBots;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getConnectedBots
 */
final class GetConnectedBotsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4ea4c80f;
    
    public string $_ = 'account.getConnectedBots';
    
    public function getMethodName(): string
    {
        return 'account.getConnectedBots';
    }
    
    public function getResponseClass(): string
    {
        return ConnectedBots::class;
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