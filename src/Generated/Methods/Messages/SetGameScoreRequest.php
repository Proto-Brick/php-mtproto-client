<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setGameScore
 */
final class SetGameScoreRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8ef8ecc0;
    
    public string $_ = 'messages.setGameScore';
    
    public function getMethodName(): string
    {
        return 'messages.setGameScore';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     * @param AbstractInputUser $userId
     * @param int $score
     * @param bool|null $editMessage
     * @param bool|null $force
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id,
        public readonly AbstractInputUser $userId,
        public readonly int $score,
        public readonly ?bool $editMessage = null,
        public readonly ?bool $force = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->editMessage) $flags |= (1 << 0);
        if ($this->force) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->score);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}