<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputNotifyPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPeerNotifySettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateNotifySettings
 */
final class UpdateNotifySettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x84be5b93;
    
    public string $predicate = 'account.updateNotifySettings';
    
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
     * @param InputPeerNotifySettings $settings
     */
    public function __construct(
        public readonly AbstractInputNotifyPeer $peer,
        public readonly InputPeerNotifySettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->settings->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}