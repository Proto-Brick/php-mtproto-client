<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Stories;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/stories.activateStealthMode
 */
final class ActivateStealthModeRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x57bbd166;
    
    public string $predicate = 'stories.activateStealthMode';
    
    public function getMethodName(): string
    {
        return 'stories.activateStealthMode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param true|null $past
     * @param true|null $future
     */
    public function __construct(
        public readonly ?true $past = null,
        public readonly ?true $future = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->past) {
            $flags |= (1 << 0);
        }
        if ($this->future) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
}