<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\AbstractStickerSetInstallResult;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.installStickerSet
 */
final class InstallStickerSetRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc78fe460;
    
    public string $predicate = 'messages.installStickerSet';
    
    public function getMethodName(): string
    {
        return 'messages.installStickerSet';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStickerSetInstallResult::class;
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     * @param bool $archived
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset,
        public readonly bool $archived
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        $buffer .= ($this->archived ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}