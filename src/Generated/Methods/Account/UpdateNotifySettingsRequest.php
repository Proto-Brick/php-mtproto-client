<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputNotifyPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeerNotifySettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateNotifySettings
 */
final class UpdateNotifySettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2227067795;
    
    public string $_ = 'account.updateNotifySettings';
    
    public function getMethodName(): string
    {
        return 'account.updateNotifySettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputNotifyPeer $peer
     * @param AbstractInputPeerNotifySettings $settings
     */
    public function __construct(
        public readonly AbstractInputNotifyPeer $peer,
        public readonly AbstractInputPeerNotifySettings $settings
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        $buffer .= $this->settings->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}