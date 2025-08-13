<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/privacyValueAllowUsers
 */
final class PrivacyValueAllowUsers extends AbstractPrivacyRule
{
    public const CONSTRUCTOR_ID = 0xb8905fb2;
    
    public string $predicate = 'privacyValueAllowUsers';
    
    /**
     * @param list<int> $users
     */
    public function __construct(
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfLongs($this->users);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $users = Deserializer::vectorOfLongs($stream);

        return new self(
            $users
        );
    }
}