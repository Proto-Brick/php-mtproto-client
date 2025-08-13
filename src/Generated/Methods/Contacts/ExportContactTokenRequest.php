<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\ExportedContactToken;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.exportContactToken
 */
final class ExportContactTokenRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0xf8654027;
    
    public string $predicate = 'contacts.exportContactToken';
    
    public function getMethodName(): string
    {
        return 'contacts.exportContactToken';
    }
    
    public function getResponseClass(): string
    {
        return ExportedContactToken::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        return Serializer::int32(self::CONSTRUCTOR_ID);
    }
}