<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Users\AbstractUsers;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.getBotRecommendations
 */
final class GetBotRecommendationsRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xa1b70815;
    
    public string $predicate = 'bots.getBotRecommendations';
    
    public function getMethodName(): string
    {
        return 'bots.getBotRecommendations';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUsers::class;
    }
    /**
     * @param AbstractInputUser $bot
     */
    public function __construct(
        public readonly AbstractInputUser $bot
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        return $buffer;
    }
}