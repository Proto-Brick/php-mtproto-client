<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\ProfileTab;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.setMainProfileTab
 */
final class SetMainProfileTabRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3583fcb1;
    
    public string $predicate = 'channels.setMainProfileTab';
    
    public function getMethodName(): string
    {
        return 'channels.setMainProfileTab';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputChannel $channel
     * @param ProfileTab $tab
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly ProfileTab $tab
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->channel->serialize();
        $buffer .= $this->tab->serialize();
        return $buffer;
    }
}