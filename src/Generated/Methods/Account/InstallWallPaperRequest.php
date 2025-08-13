<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputWallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WallPaperSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.installWallPaper
 */
final class InstallWallPaperRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xfeed5769;
    
    public string $predicate = 'account.installWallPaper';
    
    public function getMethodName(): string
    {
        return 'account.installWallPaper';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputWallPaper $wallpaper
     * @param WallPaperSettings $settings
     */
    public function __construct(
        public readonly AbstractInputWallPaper $wallpaper,
        public readonly WallPaperSettings $settings
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->wallpaper->serialize();
        $buffer .= $this->settings->serialize();
        return $buffer;
    }
}