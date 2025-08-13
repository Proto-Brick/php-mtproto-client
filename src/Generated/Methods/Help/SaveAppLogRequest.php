<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\InputAppEvent;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/help.saveAppLog
 */
final class SaveAppLogRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x6f02f748;
    
    public string $predicate = 'help.saveAppLog';
    
    public function getMethodName(): string
    {
        return 'help.saveAppLog';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param list<InputAppEvent> $events
     */
    public function __construct(
        public readonly array $events
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->events);
        return $buffer;
    }
}