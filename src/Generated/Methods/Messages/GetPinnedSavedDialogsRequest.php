<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractSavedDialogs;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getPinnedSavedDialogs
 */
final class GetPinnedSavedDialogsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd63d94e0;
    
    public string $predicate = 'messages.getPinnedSavedDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getPinnedSavedDialogs';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedDialogs::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}