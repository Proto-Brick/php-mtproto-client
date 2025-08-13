<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\MessageRange;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getSplitRanges
 */
final class GetSplitRangesRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1cff7e08;
    
    public string $predicate = 'messages.getSplitRanges';
    
    public function getMethodName(): string
    {
        return 'messages.getSplitRanges';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . MessageRange::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}