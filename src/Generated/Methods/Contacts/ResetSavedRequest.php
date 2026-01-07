<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.resetSaved
 */
final class ResetSavedRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x879537f1;
    
    public string $predicate = 'contacts.resetSaved';
    
    public function getMethodName(): string
    {
        return 'contacts.resetSaved';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}