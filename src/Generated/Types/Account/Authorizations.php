<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractAuthorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.authorizations
 */
final class Authorizations extends AbstractAuthorizations
{
    public const CONSTRUCTOR_ID = 1275039392;
    
    public string $_ = 'account.authorizations';
    
    /**
     * @param int $authorizationTtlDays
     * @param list<AbstractAuthorization> $authorizations
     */
    public function __construct(
        public readonly int $authorizationTtlDays,
        public readonly array $authorizations
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int32($this->authorizationTtlDays);
        $buffer .= $serializer->vectorOfObjects($this->authorizations);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $authorizationTtlDays = $deserializer->int32($stream);
        $authorizations = $deserializer->vectorOfObjects($stream, [AbstractAuthorization::class, 'deserialize']);
            return new self(
            $authorizationTtlDays,
            $authorizations
        );
    }
}