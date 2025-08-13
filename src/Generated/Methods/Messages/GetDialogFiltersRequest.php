<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Messages\DialogFilters;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getDialogFilters
 */
final class GetDialogFiltersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xefd48c89;
    
    public string $predicate = 'messages.getDialogFilters';
    
    public function getMethodName(): string
    {
        return 'messages.getDialogFilters';
    }
    
    public function getResponseClass(): string
    {
        return DialogFilters::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}