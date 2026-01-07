<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Channels;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputChannel;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/channels.toggleSignatures
 */
final class ToggleSignaturesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x418d549c;
    
    public string $predicate = 'channels.toggleSignatures';
    
    public function getMethodName(): string
    {
        return 'channels.toggleSignatures';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputChannel $channel
     * @param true|null $signaturesEnabled
     * @param true|null $profilesEnabled
     */
    public function __construct(
        public readonly AbstractInputChannel $channel,
        public readonly ?true $signaturesEnabled = null,
        public readonly ?true $profilesEnabled = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->signaturesEnabled) {
            $flags |= (1 << 0);
        }
        if ($this->profilesEnabled) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->channel->serialize();
        return $buffer;
    }
}