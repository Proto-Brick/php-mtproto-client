<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

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
        if ($this->firstName !== null) {
            $flags |= (1 << 0);
        }
        if ($this->lastName !== null) {
            $flags |= (1 << 0);
        }
        if ($this->username !== null) {
            $flags |= (1 << 1);
        }
        if ($this->photo !== null) {
            $flags |= (1 << 2);
        }
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
    public static function deserialize(string $__payload, &$__offset): static
    {
        Deserializer::int32($__payload, $__offset); // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $userId = Deserializer::int64($__payload, $__offset);
        $firstName = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $lastName = (($flags & (1 << 0)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $username = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($__payload, $__offset) : null;
        $photo = (($flags & (1 << 2)) !== 0) ? AbstractPhoto::deserialize($__payload, $__offset) : null;

        return new self(
            $userId,
            $firstName,
            $lastName,
            $username,
            $photo
        );
    }
}