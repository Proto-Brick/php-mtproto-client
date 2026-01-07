<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.updateContactNote
 */
final class UpdateContactNoteRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x139f63fb;
    
    public string $predicate = 'contacts.updateContactNote';
    
    public function getMethodName(): string
    {
        return 'contacts.updateContactNote';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $id
     * @param TextWithEntities $note
     */
    public function __construct(
        public readonly AbstractInputUser $id,
        public readonly TextWithEntities $note
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        $buffer .= $this->note->serialize();
        return $buffer;
    }
}