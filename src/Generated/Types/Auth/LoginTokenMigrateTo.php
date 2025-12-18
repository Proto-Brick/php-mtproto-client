<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.loginTokenMigrateTo
 */
final class LoginTokenMigrateTo extends AbstractLoginToken
{
    public const CONSTRUCTOR_ID = 0x68e9916;
    
    public string $predicate = 'auth.loginTokenMigrateTo';
    
    /**
     * @param int $dcId
     * @param string $token
     */
    public function __construct(
        public readonly int $dcId,
        public readonly string $token
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->dcId);
        $buffer .= Serializer::bytes($this->token);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $dcId = Deserializer::int32($__payload, $__offset);
        $token = Deserializer::bytes($__payload, $__offset);

        return new self(
            $dcId,
            $token
        );
    }
}