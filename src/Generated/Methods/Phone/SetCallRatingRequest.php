<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputPhoneCall;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.setCallRating
 */
final class SetCallRatingRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x59ead627;
    
    public string $_ = 'phone.setCallRating';
    
    public function getMethodName(): string
    {
        return 'phone.setCallRating';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param InputPhoneCall $peer
     * @param int $rating
     * @param string $comment
     * @param bool|null $userInitiative
     */
    public function __construct(
        public readonly InputPhoneCall $peer,
        public readonly int $rating,
        public readonly string $comment,
        public readonly ?bool $userInitiative = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->userInitiative) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->rating);
        $buffer .= Serializer::bytes($this->comment);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}