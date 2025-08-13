<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Langpack;

use ProtoBrick\MTProtoClient\Generated\Types\Base\LangPackDifference;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/langpack.getLangPack
 */
final class GetLangPackRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf2f2330a;
    
    public string $predicate = 'langpack.getLangPack';
    
    public function getMethodName(): string
    {
        return 'langpack.getLangPack';
    }
    
    public function getResponseClass(): string
    {
        return LangPackDifference::class;
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