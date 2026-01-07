<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\ShippingOption;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.setBotShippingResults
 */
final class SetBotShippingResultsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe5f672fa;
    
    public string $predicate = 'messages.setBotShippingResults';
    
    public function getMethodName(): string
    {
        return 'messages.setBotShippingResults';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $queryId
     * @param string|null $error
     * @param list<ShippingOption>|null $shippingOptions
     */
    public function __construct(
        public readonly int $queryId,
        public readonly ?string $error = null,
        public readonly ?array $shippingOptions = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->error !== null) {
            $flags |= (1 << 0);
        }
        if ($this->shippingOptions !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->queryId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->error);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->shippingOptions);
        }
        return $buffer;
    }
}