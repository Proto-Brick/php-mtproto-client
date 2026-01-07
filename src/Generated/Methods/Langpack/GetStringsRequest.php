<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Langpack;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractLangPackString;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/langpack.getStrings
 */
final class GetStringsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xefea3803;
    
    public string $predicate = 'langpack.getStrings';
    
    public function getMethodName(): string
    {
        return 'langpack.getStrings';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . AbstractLangPackString::class . '>';
    }
    /**
     * @param string $langPack
     * @param string $langCode
     * @param list<string> $keys
     */
    public function __construct(
        public readonly string $langPack,
        public readonly string $langCode,
        public readonly array $keys
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langPack);
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::vectorOfStrings($this->keys);
        return $buffer;
    }
}