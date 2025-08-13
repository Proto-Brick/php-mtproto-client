<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotPreviewMedia;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.getPreviewMedias
 */
final class GetPreviewMediasRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa2a5594d;
    
    public string $predicate = 'bots.getPreviewMedias';
    
    public function getMethodName(): string
    {
        return 'bots.getPreviewMedias';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . BotPreviewMedia::class . '>';
    }
    /**
     * @param AbstractInputUser $bot
     */
    public function __construct(
        public readonly AbstractInputUser $bot
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        return $buffer;
    }
}