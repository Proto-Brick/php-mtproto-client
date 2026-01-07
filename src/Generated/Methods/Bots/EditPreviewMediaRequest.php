<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotPreviewMedia;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.editPreviewMedia
 */
final class EditPreviewMediaRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8525606f;
    
    public string $predicate = 'bots.editPreviewMedia';
    
    public function getMethodName(): string
    {
        return 'bots.editPreviewMedia';
    }
    
    public function getResponseClass(): string
    {
        return BotPreviewMedia::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $langCode
     * @param AbstractInputMedia $media
     * @param AbstractInputMedia $newMedia
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $langCode,
        public readonly AbstractInputMedia $media,
        public readonly AbstractInputMedia $newMedia
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= $this->media->serialize();
        $buffer .= $this->newMedia->serialize();
        return $buffer;
    }
}