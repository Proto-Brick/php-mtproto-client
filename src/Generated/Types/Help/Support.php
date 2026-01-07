<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Help;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/help.support
 */
final class Support extends TlObject
{
    public const CONSTRUCTOR_ID = 0x17c6b5f6;
    
    public string $predicate = 'help.support';
    
    /**
     * @param string $phoneNumber
     * @param AbstractUser $user
     */
    public function __construct(
        public readonly string $phoneNumber,
        public readonly AbstractUser $user
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->phoneNumber);
        $buffer .= $this->user->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $constructorId = Deserializer::int32($__payload, $__offset);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $phoneNumber = Deserializer::bytes($__payload, $__offset);
        $user = AbstractUser::deserialize($__payload, $__offset);

        return new self(
            $phoneNumber,
            $user
        );
    }
}