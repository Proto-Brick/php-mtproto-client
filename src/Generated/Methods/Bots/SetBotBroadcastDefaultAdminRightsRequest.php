<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChatAdminRights;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.setBotBroadcastDefaultAdminRights
 */
final class SetBotBroadcastDefaultAdminRightsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2021942497;
    
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
     * @param AbstractChatAdminRights $adminRights
     */
    public function __construct(
        public readonly AbstractChatAdminRights $adminRights
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->adminRights->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}