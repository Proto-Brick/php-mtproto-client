<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateInlineBotCallbackQuery
 */
final class UpdateInlineBotCallbackQuery extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x691e9052;
    
    public string $_ = 'updateInlineBotCallbackQuery';
    
    /**
     * @param int $queryId
     * @param int $userId
     * @param AbstractInputBotInlineMessageID $msgId
     * @param int $chatInstance
     * @param string|null $data
     * @param string|null $gameShortName
     */
    public function __construct(
        public readonly int $queryId,
        public readonly int $userId,
        public readonly AbstractInputBotInlineMessageID $msgId,
        public readonly int $chatInstance,
        public readonly ?string $data = null,
        public readonly ?string $gameShortName = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->data !== null) $flags |= (1 << 0);
        if ($this->gameShortName !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int64($this->queryId);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= $this->msgId->serialize();
        $buffer .= Serializer::int64($this->chatInstance);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->data);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->gameShortName);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $queryId = Deserializer::int64($stream);
        $userId = Deserializer::int64($stream);
        $msgId = AbstractInputBotInlineMessageID::deserialize($stream);
        $chatInstance = Deserializer::int64($stream);
        $data = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $gameShortName = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        return new self(
            $queryId,
            $userId,
            $msgId,
            $chatInstance,
            $data,
            $gameShortName
        );
    }
}