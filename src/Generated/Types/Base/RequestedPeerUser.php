<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/requestedPeerUser
 */
final class RequestedPeerUser extends AbstractRequestedPeer
{
    public const CONSTRUCTOR_ID = 0xd62ff46a;
    
    public string $predicate = 'requestedPeerUser';
    
    /**
     * @param int $userId
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $username
     * @param AbstractPhoto|null $photo
     */
    public function __construct(
        public readonly int $userId,
        public readonly ?string $firstName = null,
        public readonly ?string $lastName = null,
        public readonly ?string $username = null,
        public readonly ?AbstractPhoto $photo = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->firstName !== null) $flags |= (1 << 0);
        if ($this->lastName !== null) $flags |= (1 << 0);
        if ($this->username !== null) $flags |= (1 << 1);
        if ($this->photo !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->firstName);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->lastName);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->username);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->photo->serialize();
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $userId = Deserializer::int64($stream);
        $firstName = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $lastName = ($flags & (1 << 0)) ? Deserializer::bytes($stream) : null;
        $username = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $photo = ($flags & (1 << 2)) ? AbstractPhoto::deserialize($stream) : null;

        return new self(
            $userId,
            $firstName,
            $lastName,
            $username,
            $photo
        );
    }
}