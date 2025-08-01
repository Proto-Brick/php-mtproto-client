<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractAuthorizations;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getAuthorizations
 */
final class GetAuthorizationsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3810574680;
    
    public string $_ = 'account.getAuthorizations';
    
    public function getMethodName(): string
    {
        return 'account.getAuthorizations';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAuthorizations::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}