<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\PeerDialogs;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getPinnedDialogs
 */
final class GetPinnedDialogsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd6b94df2;
    
    public string $predicate = 'messages.getPinnedDialogs';
    
    public function getMethodName(): string
    {
        return 'messages.getPinnedDialogs';
    }
    
    public function getResponseClass(): string
    {
        return PeerDialogs::class;
    }
    /**
     * @param int $folderId
     */
    public function __construct(
        public readonly int $folderId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->folderId);
        return $buffer;
    }
}