<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWebAuthorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.webAuthorizations
 */
final class WebAuthorizations extends AbstractWebAuthorizations
{
    public const CONSTRUCTOR_ID = 3981887996;
    
    public string $_ = 'account.webAuthorizations';
    
    /**
     * @param list<AbstractWebAuthorization> $authorizations
     * @param list<AbstractUser> $users
     */
    public function __construct(
        public readonly array $authorizations,
        public readonly array $users
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->authorizations);
        $buffer .= $serializer->vectorOfObjects($this->users);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $authorizations = $deserializer->vectorOfObjects($stream, [AbstractWebAuthorization::class, 'deserialize']);
        $users = $deserializer->vectorOfObjects($stream, [AbstractUser::class, 'deserialize']);
            return new self(
            $authorizations,
            $users
        );
    }
}