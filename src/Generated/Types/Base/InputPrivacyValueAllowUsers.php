<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/inputPrivacyValueAllowUsers
 */
final class InputPrivacyValueAllowUsers extends AbstractInputPrivacyRule
{
    public const CONSTRUCTOR_ID = 0x131cc67f;
    
    public string $predicate = 'inputPrivacyValueAllowUsers';
    
    /**
     * @param list<AbstractInputUser> $users
     */
    public function __construct(
        public readonly array $users
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->users);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $users = Deserializer::vectorOfObjects($stream, [AbstractInputUser::class, 'deserialize']);

        return new self(
            $users
        );
    }
}