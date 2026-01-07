<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotCommandScope;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommand;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.setBotCommands
 */
final class SetBotCommandsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x517165a;
    
    public string $predicate = 'bots.setBotCommands';
    
    public function getMethodName(): string
    {
        return 'bots.setBotCommands';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractBotCommandScope $scope
     * @param string $langCode
     * @param list<BotCommand> $commands
     */
    public function __construct(
        public readonly AbstractBotCommandScope $scope,
        public readonly string $langCode,
        public readonly array $commands
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->scope->serialize();
        $buffer .= Serializer::bytes($this->langCode);
        $buffer .= Serializer::vectorOfObjects($this->commands);
        return $buffer;
    }
}