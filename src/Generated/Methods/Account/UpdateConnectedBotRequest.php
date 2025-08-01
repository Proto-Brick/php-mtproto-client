<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBusinessBotRecipients;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.updateConnectedBot
 */
final class UpdateConnectedBotRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1138250269;
    
    public string $_ = 'account.updateConnectedBot';
    
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
     * @param AbstractInputBusinessBotRecipients $recipients
     * @param bool|null $canReply
     * @param bool|null $deleted
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly AbstractInputBusinessBotRecipients $recipients,
        public readonly ?bool $canReply = null,
        public readonly ?bool $deleted = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->canReply) $flags |= (1 << 0);
        if ($this->deleted) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $this->recipients->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}