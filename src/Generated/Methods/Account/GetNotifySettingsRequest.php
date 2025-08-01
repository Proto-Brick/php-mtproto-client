<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputNotifyPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractPeerNotifySettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getNotifySettings
 */
final class GetNotifySettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 313765169;
    
    public string $_ = 'account.getNotifySettings';
    
    public function getMethodName(): string
    {
        return 'account.getNotifySettings';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPeerNotifySettings::class;
    }
    /**
     * @param AbstractInputNotifyPeer $peer
     */
    public function __construct(
        public readonly AbstractInputNotifyPeer $peer
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}