<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Users;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Users\AbstractSavedMusic;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/users.getSavedMusicByID
 */
final class GetSavedMusicByIDRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7573a4e9;
    
    public string $predicate = 'users.getSavedMusicByID';
    
    public function getMethodName(): string
    {
        return 'users.getSavedMusicByID';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedMusic::class;
    }
    /**
     * @param AbstractInputUser $id
     * @param list<AbstractInputDocument> $documents
     */
    public function __construct(
        public readonly AbstractInputUser $id,
        public readonly array $documents
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= Serializer::vectorOfObjects($this->documents);
        return $buffer;
    }
}