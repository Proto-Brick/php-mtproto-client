<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Photos;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Photos\AbstractPhotos;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/photos.getUserPhotos
 */
final class GetUserPhotosRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x91cd32a8;
    
    public string $predicate = 'photos.getUserPhotos';
    
    public function getMethodName(): string
    {
        return 'photos.getUserPhotos';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPhotos::class;
    }
    /**
     * @param AbstractInputUser $userId
     * @param int $offset
     * @param int $maxId
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly int $offset,
        public readonly int $maxId,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int64($this->maxId);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}