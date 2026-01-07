<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.dismissSuggestion
 */
final class DismissSuggestionRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf50dbaa1;
    
    public string $predicate = 'help.dismissSuggestion';
    
    public function getMethodName(): string
    {
        return 'help.dismissSuggestion';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $peer
     * @param string $suggestion
     */
    public function __construct(
        public readonly AbstractInputPeer $peer,
        public readonly string $suggestion
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->peer->serialize();
        $buffer .= Serializer::bytes($this->suggestion);
        return $buffer;
    }
}