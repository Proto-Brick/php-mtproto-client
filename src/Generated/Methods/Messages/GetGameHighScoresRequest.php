<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Messages\HighScores;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getGameHighScores
 */
final class GetGameHighScoresRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe822649d;
    
    public string $predicate = 'messages.getGameHighScores';
    
    public function getMethodName(): string
    {
        return 'messages.getGameHighScores';
    }
    
    public function getResponseClass(): string
    {
        return HighScores::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        $buffer .= $this->userId->serialize();

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}