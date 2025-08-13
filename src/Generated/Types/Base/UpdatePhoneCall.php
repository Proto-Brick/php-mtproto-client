<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/updatePhoneCall
 */
final class UpdatePhoneCall extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xab0f6b1e;
    
    public string $predicate = 'updatePhoneCall';
    
    /**
     * @param AbstractPhoneCall $phoneCall
     */
    public function __construct(
        public readonly AbstractPhoneCall $phoneCall
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->phoneCall->serialize();
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $phoneCall = AbstractPhoneCall::deserialize($stream);

        return new self(
            $phoneCall
        );
    }
}