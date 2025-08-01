<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractChatAdminRights;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.setBotGroupDefaultAdminRights
 */
final class SetBotGroupDefaultAdminRightsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2455685610;
    
    public string $_ = 'bots.setBotGroupDefaultAdminRights';
    
    public function getMethodName(): string
    {
        return 'bots.setBotGroupDefaultAdminRights';
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