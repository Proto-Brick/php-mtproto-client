<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractChats;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.getChatsToSend
 */
final class GetChatsToSendRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa56a8b60;
    
    public string $predicate = 'stories.getChatsToSend';
    
    public function getMethodName(): string
    {
        return 'stories.getChatsToSend';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}