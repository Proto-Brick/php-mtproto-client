<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.setBotInfo
 */
final class SetBotInfoRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x10cf3123;
    
    public string $predicate = 'bots.setBotInfo';
    
    public function getMethodName(): string
    {
        return 'bots.setBotInfo';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $langCode
     * @param AbstractInputUser|null $bot
     * @param string|null $name
     * @param string|null $about
     * @param string|null $description
     */
    public function __construct(
        public readonly string $langCode,
        public readonly ?AbstractInputUser $bot = null,
        public readonly ?string $name = null,
        public readonly ?string $about = null,
        public readonly ?string $description = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->bot !== null) {
            $flags |= (1 << 2);
        }
        if ($this->name !== null) {
            $flags |= (1 << 3);
        }
        if ($this->about !== null) {
            $flags |= (1 << 0);
        }
        if ($this->description !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 2)) {
            $buffer .= $this->bot->serialize();
        }
        $buffer .= Serializer::bytes($this->langCode);
        if ($flags & (1 << 3)) {
            $buffer .= Serializer::bytes($this->name);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->about);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->description);
        }
        return $buffer;
    }
}