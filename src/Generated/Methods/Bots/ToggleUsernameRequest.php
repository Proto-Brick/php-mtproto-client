<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.toggleUsername
 */
final class ToggleUsernameRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x53ca973;
    
    public string $predicate = 'bots.toggleUsername';
    
    public function getMethodName(): string
    {
        return 'bots.toggleUsername';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $username
     * @param bool $active
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $username,
        public readonly bool $active
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::bytes($this->username);
        $buffer .= ($this->active ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}