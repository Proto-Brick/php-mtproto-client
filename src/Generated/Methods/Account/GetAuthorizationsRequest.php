<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\Authorizations;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getAuthorizations
 */
final class GetAuthorizationsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe320c158;
    
    public string $predicate = 'account.getAuthorizations';
    
    public function getMethodName(): string
    {
        return 'account.getAuthorizations';
    }
    
    public function getResponseClass(): string
    {
        return Authorizations::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}