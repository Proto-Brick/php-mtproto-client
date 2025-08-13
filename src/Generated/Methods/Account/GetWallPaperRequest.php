<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputWallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractWallPaper;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.getWallPaper
 */
final class GetWallPaperRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfc8ddbea;
    
    public string $predicate = 'account.getWallPaper';
    
    public function getMethodName(): string
    {
        return 'account.getWallPaper';
    }
    
    public function getResponseClass(): string
    {
        return AbstractWallPaper::class;
    }
    /**
     * @param AbstractInputWallPaper $wallpaper
     */
    public function __construct(
        public readonly AbstractInputWallPaper $wallpaper
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->wallpaper->serialize();
        return $buffer;
    }
}