<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\HistoryImport;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.initHistoryImport
 */
final class InitHistoryImportRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x34090c3b;
    
    public string $predicate = 'messages.initHistoryImport';
    
    public function getMethodName(): string
    {
        return 'messages.initHistoryImport';
    }
    
    public function getResponseClass(): string
    {
        return HistoryImport::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param AbstractInputFile $file
     * @param int $mediaCount
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly AbstractInputFile $file,
        public readonly int $mediaCount
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= $this->file->serialize();
        $buffer .= Serializer::int32($this->mediaCount);
        return $buffer;
    }
}