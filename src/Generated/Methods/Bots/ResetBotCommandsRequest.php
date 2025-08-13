<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotCommandScope;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.resetBotCommands
 */
final class ResetBotCommandsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3d8de0f9;
    
    public string $predicate = 'bots.resetBotCommands';
    
    public function getMethodName(): string
    {
        return 'bots.resetBotCommands';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
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