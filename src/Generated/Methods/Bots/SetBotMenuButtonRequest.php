<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotMenuButton;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.setBotMenuButton
 */
final class SetBotMenuButtonRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x4504d54f;
    
    public string $predicate = 'bots.setBotMenuButton';
    
    public function getMethodName(): string
    {
        return 'bots.setBotMenuButton';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $userId
     * @param AbstractBotMenuButton $button
     */
    public function __construct(
        public readonly AbstractInputUser $userId,
        public readonly AbstractBotMenuButton $button
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        $buffer .= $this->button->serialize();
        return $buffer;
    }
}