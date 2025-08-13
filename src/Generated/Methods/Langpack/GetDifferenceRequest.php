<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Langpack;

use ProtoBrick\MTProtoClient\Generated\Types\Base\LangPackDifference;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/langpack.getDifference
 */
final class GetDifferenceRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xcd984aa5;
    
    public string $predicate = 'langpack.getDifference';
    
    public function getMethodName(): string
    {
        return 'langpack.getDifference';
    }
    
    public function getResponseClass(): string
    {
        return LangPackDifference::class;
    }
    /**
     * @param string $langPack
     * @param string $langCode
     * @param int $fromVersion
     */
    public function __construct(
        public readonly string $langPack,
        public readonly string $langCode,
        public readonly int $fromVersion
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langPack);
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::int32($this->fromVersion);
        return $buffer;
    }
}