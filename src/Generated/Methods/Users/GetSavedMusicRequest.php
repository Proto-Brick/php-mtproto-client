<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Users;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Users\AbstractSavedMusic;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/users.getSavedMusic
 */
final class GetSavedMusicRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x788d7fe3;
    
    public string $predicate = 'users.getSavedMusic';
    
    public function getMethodName(): string
    {
        return 'users.getSavedMusic';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedMusic::class;
    }
    /**
     * @param AbstractInputUser $id
     * @param int $offset
     * @param int $limit
     * @param int $hash
     */
    public function __construct(
        public readonly AbstractInputUser $id,
        public readonly int $offset,
        public readonly int $limit,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);
        $buffer .= Serializer::int64($this->hash);
        return $buffer;
    }
}