<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.setCustomVerification
 */
final class SetCustomVerificationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8b89dfbd;
    
    public string $predicate = 'bots.setCustomVerification';
    
    public function getMethodName(): string
    {
        return 'bots.setCustomVerification';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $enabled
     * @param AbstractInputUser|null $bot
     * @param string|null $customDescription
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $enabled = null,
        public readonly ?AbstractInputUser $bot = null,
        public readonly ?string $customDescription = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->enabled) $flags |= (1 << 1);
        if ($this->bot !== null) $flags |= (1 << 0);
        if ($this->customDescription !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->bot->serialize();
        }
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->customDescription);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}