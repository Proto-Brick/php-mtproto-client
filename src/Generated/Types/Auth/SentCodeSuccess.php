<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeSuccess
 */
final class SentCodeSuccess extends AbstractSentCode
{
    public const CONSTRUCTOR_ID = 0x2390fe44;
    
    public string $predicate = 'auth.sentCodeSuccess';
    
    /**
     * @param AbstractAuthorization $authorization
     */
    public function __construct(
        public readonly AbstractAuthorization $authorization
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->authorization->serialize();
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $authorization = AbstractAuthorization::deserialize($__payload, $__offset);

        return new self(
            $authorization
        );
    }
}