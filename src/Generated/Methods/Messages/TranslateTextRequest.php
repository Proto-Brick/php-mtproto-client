<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputPeer;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\Generated\Types\Messages\TranslatedText;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.translateText
 */
final class TranslateTextRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x63183030;
    
    public string $predicate = 'messages.translateText';
    
    public function getMethodName(): string
    {
        return 'messages.translateText';
    }
    
    public function getResponseClass(): string
    {
        return TranslatedText::class;
    }
    /**
     * @param string $toLang
     * @param AbstractInputPeer|null $peer
     * @param list<int>|null $id
     * @param list<TextWithEntities>|null $text
     */
    public function __construct(
        public readonly string $toLang,
        public readonly ?AbstractInputPeer $peer = null,
        public readonly ?array $id = null,
        public readonly ?array $text = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->peer !== null) {
            $flags |= (1 << 0);
        }
        if ($this->id !== null) {
            $flags |= (1 << 0);
        }
        if ($this->text !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->peer->serialize();
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfInts($this->id);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->text);
        }
        $buffer .= Serializer::bytes($this->toLang);
        return $buffer;
    }
}