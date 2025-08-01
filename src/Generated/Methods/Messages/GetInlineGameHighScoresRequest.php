<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputBotInlineMessageID;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractHighScores;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getInlineGameHighScores
 */
final class GetInlineGameHighScoresRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 258170395;
    
    public string $_ = 'messages.getInlineGameHighScores';
    
    public function getMethodName(): string
    {
        return 'messages.getInlineGameHighScores';
    }
    
    public function getResponseClass(): string
    {
        return AbstractHighScores::class;
    }
    /**
     * @param AbstractInputBotInlineMessageID $id
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputBotInlineMessageID $id,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize($serializer);
        $buffer .= $this->userId->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}