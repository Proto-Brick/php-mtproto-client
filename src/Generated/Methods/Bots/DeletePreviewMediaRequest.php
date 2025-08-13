<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputMedia;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.deletePreviewMedia
 */
final class DeletePreviewMediaRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x2d0135b3;
    
    public string $predicate = 'bots.deletePreviewMedia';
    
    public function getMethodName(): string
    {
        return 'bots.deletePreviewMedia';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $langCode
     * @param list<AbstractInputMedia> $media
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $langCode,
        public readonly array $media
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::vectorOfObjects($this->media);
        return $buffer;
    }
}