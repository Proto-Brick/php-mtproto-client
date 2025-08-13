<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotCommandScope;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BotCommand;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.getBotCommands
 */
final class GetBotCommandsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xe34c0dd6;
    
    public string $predicate = 'bots.getBotCommands';
    
    public function getMethodName(): string
    {
        return 'bots.getBotCommands';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . BotCommand::class . '>';
    }
    /**
     * @param AbstractBotCommandScope $scope
     * @param string $langCode
     */
    public function __construct(
        public readonly AbstractBotCommandScope $scope,
        public readonly string $langCode
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->scope->serialize();
        $buffer .= Serializer::bytes($this->langCode);
        return $buffer;
    }
}