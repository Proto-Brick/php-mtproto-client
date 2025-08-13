<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Langpack;

use ProtoBrick\MTProtoClient\Generated\Types\Base\LangPackLanguage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/langpack.getLanguages
 */
final class GetLanguagesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x42c6978f;
    
    public string $predicate = 'langpack.getLanguages';
    
    public function getMethodName(): string
    {
        return 'langpack.getLanguages';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . LangPackLanguage::class . '>';
    }
    /**
     * @param string $langPack
     */
    public function __construct(
        public readonly string $langPack
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langPack);
        return $buffer;
    }
}