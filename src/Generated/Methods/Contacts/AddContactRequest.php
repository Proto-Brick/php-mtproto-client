<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\Generated\Types\Base\TextWithEntities;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.addContact
 */
final class AddContactRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xd9ba2e54;
    
    public string $predicate = 'contacts.addContact';
    
    public function getMethodName(): string
    {
        return 'contacts.addContact';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $id
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     * @param true|null $addPhonePrivacyException
     * @param TextWithEntities|null $note
     */
    public function __construct(
        public readonly AbstractInputUser $id,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $phone,
        public readonly ?true $addPhonePrivacyException = null,
        public readonly ?TextWithEntities $note = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->addPhonePrivacyException) {
            $flags |= (1 << 0);
        }
        if ($this->note !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->id->serialize();
        $buffer .= Serializer::bytes($this->firstName);
        $buffer .= Serializer::bytes($this->lastName);
        $buffer .= Serializer::bytes($this->phone);
        if ($flags & (1 << 1)) {
            $buffer .= $this->note->serialize();
        }
        return $buffer;
    }
}