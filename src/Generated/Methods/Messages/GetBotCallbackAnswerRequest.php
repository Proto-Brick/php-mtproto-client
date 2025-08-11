<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputCheckPasswordSRP;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Messages\BotCallbackAnswer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getBotCallbackAnswer
 */
final class GetBotCallbackAnswerRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9342ca07;
    
    public string $_ = 'messages.getBotCallbackAnswer';
    
    public function getMethodName(): string
    {
        return 'messages.getBotCallbackAnswer';
    }
    
    public function getResponseClass(): string
    {
        return BotCallbackAnswer::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $msgId
     * @param bool|null $game
     * @param string|null $data
     * @param AbstractInputCheckPasswordSRP|null $password
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $msgId,
        public readonly ?bool $game = null,
        public readonly ?string $data = null,
        public readonly ?AbstractInputCheckPasswordSRP $password = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->game) $flags |= (1 << 1);
        if ($this->data !== null) $flags |= (1 << 0);
        if ($this->password !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->msgId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->data);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->password->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}