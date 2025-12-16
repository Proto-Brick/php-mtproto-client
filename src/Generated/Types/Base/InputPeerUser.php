<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPeerUser
 */
final class InputPeerUser extends AbstractInputPeer
{
    public const CONSTRUCTOR_ID = 0xdde8a54c;
    
    public string $predicate = 'inputPeerUser';
    
    /**
     * @param int $userId
     * @param int $accessHash
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $accessHash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int64($this->accessHash);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $userId = Deserializer::int64($stream);
        $accessHash = Deserializer::int64($stream);

        return new self(
            $userId,
            $accessHash
        );
    }
}