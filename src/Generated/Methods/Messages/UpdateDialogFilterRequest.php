<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Messages;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractDialogFilter;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/messages.updateDialogFilter
 */
final class UpdateDialogFilterRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x1ad4a04a;
    
    public string $predicate = 'messages.updateDialogFilter';
    
    public function getMethodName(): string
    {
        return 'messages.updateDialogFilter';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $id
     * @param AbstractDialogFilter|null $filter
     */
    public function __construct(
        public readonly int $id,
        public readonly ?AbstractDialogFilter $filter = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->filter !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->filter->serialize();
        }
        return $buffer;
    }
}