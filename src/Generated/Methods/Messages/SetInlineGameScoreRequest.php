<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineMessageID;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setInlineGameScore
 */
final class SetInlineGameScoreRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x15ad9f64;
    
    public string $_ = 'messages.setInlineGameScore';
    
    public function getMethodName(): string
    {
        return 'messages.setInlineGameScore';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputBotInlineMessageID $id
     * @param AbstractInputUser $userId
     * @param int $score
     * @param bool|null $editMessage
     * @param bool|null $force
     */
    public function __construct(
        public readonly AbstractInputBotInlineMessageID $id,
        public readonly AbstractInputUser $userId,
        public readonly int $score,
        public readonly ?bool $editMessage = null,
        public readonly ?bool $force = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->editMessage) $flags |= (1 << 0);
        if ($this->force) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->id->serialize($serializer);
        $buffer .= $this->userId->serialize($serializer);
        $buffer .= $serializer->int32($this->score);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}