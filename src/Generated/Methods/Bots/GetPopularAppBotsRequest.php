<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Bots\PopularAppBots;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.getPopularAppBots
 */
final class GetPopularAppBotsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xc2510192;
    
    public string $predicate = 'bots.getPopularAppBots';
    
    public function getMethodName(): string
    {
        return 'bots.getPopularAppBots';
    }
    
    public function getResponseClass(): string
    {
        return PopularAppBots::class;
    }
    /**
     * @param string $offset
     * @param int $limit
     */
    public function __construct(
        public readonly string $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->offset);
        $buffer .= Serializer::int32($this->limit);
        return $buffer;
    }
}