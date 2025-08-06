<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\Authorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.authorizations
 */
final class Authorizations extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4bff8ea0;
    
    public string $_ = 'account.authorizations';
    
    /**
     * @param int $authorizationTtlDays
     * @param list<Authorization> $authorizations
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $authorizationTtlDays = $deserializer->int32($stream);
        $authorizations = $deserializer->vectorOfObjects($stream, [Authorization::class, 'deserialize']);
        return new self(
            $authorizationTtlDays,
            $authorizations
        );
    }
}