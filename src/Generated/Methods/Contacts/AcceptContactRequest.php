<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUpdates;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.acceptContact
 */
final class AcceptContactRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf831a20f;
    
    public string $predicate = 'contacts.acceptContact';
    
    public function getMethodName(): string
    {
        return 'contacts.acceptContact';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputUser $id
     */
    public function __construct(
        public readonly AbstractInputUser $id
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->id->serialize();
        return $buffer;
    }
}