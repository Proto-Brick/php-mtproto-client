<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\ChatAdminRights;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.setBotBroadcastDefaultAdminRights
 */
final class SetBotBroadcastDefaultAdminRightsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x788464e1;
    
    public string $_ = 'bots.setBotBroadcastDefaultAdminRights';
    
    public function getMethodName(): string
    {
        return 'bots.setBotBroadcastDefaultAdminRights';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param ChatAdminRights $adminRights
     */
    public function __construct(
        public readonly ChatAdminRights $adminRights
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->adminRights->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}