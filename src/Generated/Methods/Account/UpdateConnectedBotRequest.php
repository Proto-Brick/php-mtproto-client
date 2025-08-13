<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\BusinessBotRights;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputBusinessBotRecipients;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.updateConnectedBot
 */
final class UpdateConnectedBotRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x66a08c7e;
    
    public string $predicate = 'account.updateConnectedBot';
    
    public function getMethodName(): string
    {
        return 'account.updateConnectedBot';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param InputBusinessBotRecipients $recipients
     * @param true|null $deleted
     * @param BusinessBotRights|null $rights
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly InputBusinessBotRecipients $recipients,
        public readonly ?true $deleted = null,
        public readonly ?BusinessBotRights $rights = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->deleted) {
            $flags |= (1 << 1);
        }
        if ($this->rights !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 0)) {
            $buffer .= $this->rights->serialize();
        }
        $buffer .= $this->bot->serialize();
        $buffer .= $this->recipients->serialize();
        return $buffer;
    }
}