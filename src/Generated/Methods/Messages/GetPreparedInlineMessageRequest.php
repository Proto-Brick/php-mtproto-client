<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\PreparedInlineMessage;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getPreparedInlineMessage
 */
final class GetPreparedInlineMessageRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x857ebdb8;
    
    public string $predicate = 'messages.getPreparedInlineMessage';
    
    public function getMethodName(): string
    {
        return 'messages.getPreparedInlineMessage';
    }
    
    public function getResponseClass(): string
    {
        return PreparedInlineMessage::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $id
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->id);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}