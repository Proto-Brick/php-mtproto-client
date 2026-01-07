<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputWallPaper;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WallPaperSettings;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setChatWallPaper
 */
final class SetChatWallPaperRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x8ffacae1;
    
    public string $predicate = 'messages.setChatWallPaper';
    
    public function getMethodName(): string
    {
        return 'messages.setChatWallPaper';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputPeer $peer
     * @param true|null $forBoth
     * @param true|null $revert
     * @param AbstractInputWallPaper|null $wallpaper
     * @param WallPaperSettings|null $settings
     * @param int|null $id
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly ?true $forBoth = null,
        public readonly ?true $revert = null,
        public readonly ?AbstractInputWallPaper $wallpaper = null,
        public readonly ?WallPaperSettings $settings = null,
        public readonly ?int $id = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forBoth) {
            $flags |= (1 << 3);
        }
        if ($this->revert) {
            $flags |= (1 << 4);
        }
        if ($this->wallpaper !== null) {
            $flags |= (1 << 0);
        }
        if ($this->settings !== null) {
            $flags |= (1 << 2);
        }
        if ($this->id !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->wallpaper->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->settings->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->id);
        }
        return $buffer;
    }
}