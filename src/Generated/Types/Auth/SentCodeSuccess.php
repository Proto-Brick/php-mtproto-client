<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Auth;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

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

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $authorization = AbstractAuthorization::deserialize($stream);

        return new self(
            $authorization
        );
    }
}