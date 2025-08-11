<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AutoSaveSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.saveAutoSaveSettings
 */
final class SaveAutoSaveSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd69b8361;
    
    public string $_ = 'account.saveAutoSaveSettings';
    
    public function getMethodName(): string
    {
        return 'account.saveAutoSaveSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AutoSaveSettings $settings
     * @param bool|null $users
     * @param bool|null $chats
     * @param bool|null $broadcasts
     * @param AbstractInputPeer|null $peer
     */
    public function __construct(
        public readonly AutoSaveSettings $settings,
        public readonly ?bool $users = null,
        public readonly ?bool $chats = null,
        public readonly ?bool $broadcasts = null,
        public readonly ?AbstractInputPeer $peer = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->users) $flags |= (1 << 0);
        if ($this->chats) $flags |= (1 << 1);
        if ($this->broadcasts) $flags |= (1 << 2);
        if ($this->peer !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 3)) {
            $buffer .= $this->peer->serialize();
        }
        $buffer .= $this->settings->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}