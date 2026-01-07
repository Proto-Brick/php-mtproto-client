<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getAllDrafts
 */
final class GetAllDraftsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6a3f8d65;
    
    public string $predicate = 'messages.getAllDrafts';
    
    public function getMethodName(): string
    {
        return 'messages.getAllDrafts';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}