<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Contacts;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/contacts.importContactToken
 */
final class ImportContactTokenRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x13005788;
    
    public string $predicate = 'contacts.importContactToken';
    
    public function getMethodName(): string
    {
        return 'contacts.importContactToken';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUser::class;
    }
    /**
     * @param string $token
     */
    public function __construct(
        public readonly string $token
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->token);
        return $buffer;
    }
}