<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/account.emailVerified
 */
final class EmailVerified extends AbstractEmailVerified
{
    public const CONSTRUCTOR_ID = 0x2b96cd1b;
    
    public string $predicate = 'account.emailVerified';
    
    /**
     * @param string $email
     */
    public function __construct(
        public readonly string $email
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->email);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $email = Deserializer::bytes($stream);

        return new self(
            $email
        );
    }
}