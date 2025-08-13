<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.getAllReadPeerStories
 */
final class GetAllReadPeerStoriesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9b5ae7f9;
    
    public string $predicate = 'stories.getAllReadPeerStories';
    
    public function getMethodName(): string
    {
        return 'stories.getAllReadPeerStories';
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