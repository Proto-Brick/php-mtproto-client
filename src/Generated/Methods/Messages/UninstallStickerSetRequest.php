<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputStickerSet;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.uninstallStickerSet
 */
final class UninstallStickerSetRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf96e55de;
    
    public string $predicate = 'messages.uninstallStickerSet';
    
    public function getMethodName(): string
    {
        return 'messages.uninstallStickerSet';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputStickerSet $stickerset
     */
    public function __construct(
        public readonly AbstractInputStickerSet $stickerset
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->stickerset->serialize();
        return $buffer;
    }
}