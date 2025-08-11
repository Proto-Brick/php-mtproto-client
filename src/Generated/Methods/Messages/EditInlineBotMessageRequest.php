<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineMessageID;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractReplyMarkup;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.editInlineBotMessage
 */
final class EditInlineBotMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x83557dba;
    
    public string $_ = 'messages.editInlineBotMessage';
    
    public function getMethodName(): string
    {
        return 'messages.editInlineBotMessage';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputBotInlineMessageID $id
     * @param bool|null $noWebpage
     * @param bool|null $invertMedia
     * @param string|null $message
     * @param AbstractInputMedia|null $media
     * @param AbstractReplyMarkup|null $replyMarkup
     * @param list<AbstractMessageEntity>|null $entities
     */
    public function __construct(
        public readonly AbstractInputBotInlineMessageID $id,
        public readonly ?bool $noWebpage = null,
        public readonly ?bool $invertMedia = null,
        public readonly ?string $message = null,
        public readonly ?AbstractInputMedia $media = null,
        public readonly ?AbstractReplyMarkup $replyMarkup = null,
        public readonly ?array $entities = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->noWebpage) $flags |= (1 << 1);
        if ($this->invertMedia) $flags |= (1 << 16);
        if ($this->message !== null) $flags |= (1 << 11);
        if ($this->media !== null) $flags |= (1 << 14);
        if ($this->replyMarkup !== null) $flags |= (1 << 2);
        if ($this->entities !== null) $flags |= (1 << 3);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->id->serialize();
        if ($flags & (1 << 11)) {
            $buffer .= Serializer::bytes($this->message);
        }
        if ($flags & (1 << 14)) {
            $buffer .= $this->media->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->replyMarkup->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}