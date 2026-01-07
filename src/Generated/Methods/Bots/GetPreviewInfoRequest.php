<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Bots\PreviewInfo;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.getPreviewInfo
 */
final class GetPreviewInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x423ab3ad;
    
    public string $predicate = 'bots.getPreviewInfo';
    
    public function getMethodName(): string
    {
        return 'bots.getPreviewInfo';
    }
    
    public function getResponseClass(): string
    {
        return PreviewInfo::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $langCode
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $langCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->langCode);
        return $buffer;
    }
}