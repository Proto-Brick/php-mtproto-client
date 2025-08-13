<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Langpack;

use ProtoBrick\MTProtoClient\Generated\Types\Base\LangPackLanguage;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/langpack.getLanguage
 */
final class GetLanguageRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6a596502;
    
    public string $predicate = 'langpack.getLanguage';
    
    public function getMethodName(): string
    {
        return 'langpack.getLanguage';
    }
    
    public function getResponseClass(): string
    {
        return LangPackLanguage::class;
    }
    /**
     * @param string $langPack
     * @param string $langCode
     */
    public function __construct(
        public readonly string $langPack,
        public readonly string $langCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langPack);
        $buffer .= Serializer::bytes($this->langCode);
        return $buffer;
    }
}