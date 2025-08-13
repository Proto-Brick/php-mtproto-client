<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Phone;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/phone.createConferenceCall
 */
final class CreateConferenceCallRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x7d0444bb;
    
    public string $predicate = 'phone.createConferenceCall';
    
    public function getMethodName(): string
    {
        return 'phone.createConferenceCall';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param int $randomId
     * @param true|null $muted
     * @param true|null $videoStopped
     * @param true|null $join
     * @param string|null $publicKey
     * @param string|null $block
     * @param array|null $params
     */
    public function __construct(
        public readonly int $randomId,
        public readonly ?true $muted = null,
        public readonly ?true $videoStopped = null,
        public readonly ?true $join = null,
        public readonly ?string $publicKey = null,
        public readonly ?string $block = null,
        public readonly ?array $params = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->muted) {
            $flags |= (1 << 0);
        }
        if ($this->videoStopped) {
            $flags |= (1 << 2);
        }
        if ($this->join) {
            $flags |= (1 << 3);
        }
        if ($this->publicKey !== null) {
            $flags |= (1 << 3);
        }
        if ($this->block !== null) {
            $flags |= (1 << 3);
        }
        if ($this->params !== null) {
            $flags |= (1 << 3);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->randomId);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::int256($this->publicKey);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->block);
        }
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::serializeDataJSON($this->params);
        }
        return $buffer;
    }
}