<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\Authorization;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/account.authorizations
 */
final class Authorizations extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4bff8ea0;
    
    public string $predicate = 'account.authorizations';
    
    /**
     * @param int $authorizationTtlDays
     * @param list<Authorization> $authorizations
     */
    public function __construct(
        public readonly int $authorizationTtlDays,
        public readonly array $authorizations
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->authorizationTtlDays);
        $buffer .= Serializer::vectorOfObjects($this->authorizations);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $authorizationTtlDays = Deserializer::int32($stream);
        $authorizations = Deserializer::vectorOfObjects($stream, [Authorization::class, 'deserialize']);

        return new self(
            $authorizationTtlDays,
            $authorizations
        );
    }
}