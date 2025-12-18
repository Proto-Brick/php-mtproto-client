<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Auth;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/auth.sentCodeTypeSetUpEmailRequired
 */
final class SentCodeTypeSetUpEmailRequired extends AbstractSentCodeType
{
    public const CONSTRUCTOR_ID = 0xa5491dea;
    
    public string $predicate = 'auth.sentCodeTypeSetUpEmailRequired';
    
    /**
     * @param true|null $appleSigninAllowed
     * @param true|null $googleSigninAllowed
     */
    public function __construct(
        public readonly ?true $appleSigninAllowed = null,
        public readonly ?true $googleSigninAllowed = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->appleSigninAllowed) {
            $flags |= (1 << 0);
        }
        if ($this->googleSigninAllowed) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }
    public static function deserialize(string $__payload, &$__offset): static
    {
        $__offset += 4; // Constructor ID
        $flags = Deserializer::int32($__payload, $__offset);
        $appleSigninAllowed = (($flags & (1 << 0)) !== 0) ? true : null;
        $googleSigninAllowed = (($flags & (1 << 1)) !== 0) ? true : null;

        return new self(
            $appleSigninAllowed,
            $googleSigninAllowed
        );
    }
}