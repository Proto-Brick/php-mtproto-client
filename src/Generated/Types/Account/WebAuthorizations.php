<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\WebAuthorization;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.webAuthorizations
 */
final class WebAuthorizations extends TlObject
{
    public const CONSTRUCTOR_ID = 0xed56c9fc;
    
    public string $predicate = 'account.webAuthorizations';
    
    /**
     * @param list<WebAuthorization> $authorizations
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $authorizations,
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->authorizations);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $authorizations = Deserializer::vectorOfObjects($__payload, $__offset, [WebAuthorization::class, 'deserialize']);
        $users = Deserializer::vectorOfObjects($__payload, $__offset, [AbstractUser::class, 'deserialize']);

        return new self(
            $authorizations,
            $users
        );
    }
}