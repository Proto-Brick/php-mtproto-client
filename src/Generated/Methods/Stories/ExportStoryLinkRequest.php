<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ExportedStoryLink;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.exportStoryLink
 */
final class ExportStoryLinkRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7b8def20;
    
    public string $predicate = 'stories.exportStoryLink';
    
    public function getMethodName(): string
    {
        return 'stories.exportStoryLink';
    }
    
    public function getResponseClass(): string
    {
        return ExportedStoryLink::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param int $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly int $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::int32($this->id);
        return $buffer;
    }
}