<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractPeerColors;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getPeerColors
 */
final class GetPeerColorsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xda80f42f;
    
    public string $predicate = 'help.getPeerColors';
    
    public function getMethodName(): string
    {
        return 'help.getPeerColors';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPeerColors::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
}