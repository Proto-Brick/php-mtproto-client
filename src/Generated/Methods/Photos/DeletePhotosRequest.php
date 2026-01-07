<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Photos;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPhoto;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/photos.deletePhotos
 */
final class DeletePhotosRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x87cf7f2f;
    
    public string $predicate = 'photos.deletePhotos';
    
    public function getMethodName(): string
    {
        return 'photos.deletePhotos';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<int>';
    }
    /**
     * @param list<AbstractInputPhoto> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->id);
        return $buffer;
    }
}