<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractCountriesList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getCountriesList
 */
final class GetCountriesListRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x735787a8;
    
    public string $predicate = 'help.getCountriesList';
    
    public function getMethodName(): string
    {
        return 'help.getCountriesList';
    }
    
    public function getResponseClass(): string
    {
        return AbstractCountriesList::class;
    }
    /**
     * @param string $langCode
     * @param int $hash
     */
    public function __construct(
        public readonly string $langCode,
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::int32($this->hash);
        return $buffer;
    }
}