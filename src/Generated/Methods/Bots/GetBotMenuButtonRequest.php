<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractBotMenuButton;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.getBotMenuButton
 */
final class GetBotMenuButtonRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x9c60eb28;
    
    public string $predicate = 'bots.getBotMenuButton';
    
    public function getMethodName(): string
    {
        return 'bots.getBotMenuButton';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBotMenuButton::class;
    }
    /**
     * @param AbstractInputUser $userId
     */
    public function __construct(
        public readonly AbstractInputUser $userId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->userId->serialize();
        return $buffer;
    }
}