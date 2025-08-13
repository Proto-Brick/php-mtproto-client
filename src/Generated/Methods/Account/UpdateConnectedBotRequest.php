<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\BusinessBotRights;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputBusinessBotRecipients;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateConnectedBot
 */
final class UpdateConnectedBotRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x66a08c7e;
    
    public string $predicate = 'account.updateConnectedBot';
    
    public function getMethodName(): string
    {
        return 'account.updateConnectedBot';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param InputBusinessBotRecipients $recipients
     * @param true|null $deleted
     * @param BusinessBotRights|null $rights
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly InputBusinessBotRecipients $recipients,
        public readonly ?true $deleted = null,
        public readonly ?BusinessBotRights $rights = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->deleted) $flags |= (1 << 1);
        if ($this->rights !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->rights->serialize();
        }
        $buffer .= $this->bot->serialize();
        $buffer .= $this->recipients->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}