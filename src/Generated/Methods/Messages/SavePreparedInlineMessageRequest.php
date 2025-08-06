<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInlineQueryPeerType;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineResult;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\BotPreparedInlineMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.savePreparedInlineMessage
 */
final class SavePreparedInlineMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf21f7f2f;
    
    public string $_ = 'messages.savePreparedInlineMessage';
    
    public function getMethodName(): string
    {
        return 'messages.savePreparedInlineMessage';
    }
    
    public function getResponseClass(): string
    {
        return BotPreparedInlineMessage::class;
    }
    /**
     * @param AbstractInputBotInlineResult $result
     * @param AbstractInputUser $userId
     * @param list<AbstractInlineQueryPeerType>|null $peerTypes
     */
    public function __construct(
        public readonly AbstractInputBotInlineResult $result,
        public readonly AbstractInputUser $userId,
        public readonly ?array $peerTypes = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peerTypes !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->result->serialize($serializer);
        $buffer .= $this->userId->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->peerTypes);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}