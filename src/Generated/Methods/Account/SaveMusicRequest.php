<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.saveMusic
 */
final class SaveMusicRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xb26732a9;
    
    public string $predicate = 'account.saveMusic';
    
    public function getMethodName(): string
    {
        return 'account.saveMusic';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputDocument $id
     * @param true|null $unsave
     * @param AbstractInputDocument|null $afterId
     */
    public function __construct(
        public readonly AbstractInputDocument $id,
        public readonly ?true $unsave = null,
        public readonly ?AbstractInputDocument $afterId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->unsave) {
            $flags |= (1 << 0);
        }
        if ($this->afterId !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->id->serialize();
        if ($flags & (1 << 1)) {
            $buffer .= $this->afterId->serialize();
        }
        return $buffer;
    }
}