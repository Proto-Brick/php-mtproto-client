<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Help\AbstractTimezonesList;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.getTimezonesList
 */
final class GetTimezonesListRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x49b30240;
    
    public string $predicate = 'help.getTimezonesList';
    
    public function getMethodName(): string
    {
        return 'help.getTimezonesList';
    }
    
    public function getResponseClass(): string
    {
        return AbstractTimezonesList::class;
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