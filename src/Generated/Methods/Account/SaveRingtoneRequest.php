<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Account\AbstractSavedRingtone;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputDocument;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/account.saveRingtone
 */
final class SaveRingtoneRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x3dea5b03;
    
    public string $predicate = 'account.saveRingtone';
    
    public function getMethodName(): string
    {
        return 'account.saveRingtone';
    }
    
    public function getResponseClass(): string
    {
        return AbstractSavedRingtone::class;
    }
    /**
     * @param AbstractInputDocument $id
     * @param bool $unsave
     */
    public function __construct(
        public readonly AbstractInputDocument $id,
        public readonly bool $unsave
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= ($this->unsave ? Serializer::int32(0x997275b5) : Serializer::int32(0xbc799737));
        return $buffer;
    }
}