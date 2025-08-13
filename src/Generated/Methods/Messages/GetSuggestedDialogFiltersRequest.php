<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\DialogFilterSuggested;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.getSuggestedDialogFilters
 */
final class GetSuggestedDialogFiltersRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa29cd42c;
    
    public string $predicate = 'messages.getSuggestedDialogFilters';
    
    public function getMethodName(): string
    {
        return 'messages.getSuggestedDialogFilters';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . DialogFilterSuggested::class . '>';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}