<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Auth;

use DigitalStars\MtprotoClient\Generated\Types\Auth\ExportedAuthorization;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/auth.exportAuthorization
 */
final class ExportAuthorizationRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe5bfffcd;
    
    public string $predicate = 'auth.exportAuthorization';
    
    public function getMethodName(): string
    {
        return 'auth.exportAuthorization';
    }
    
    public function getResponseClass(): string
    {
        return ExportedAuthorization::class;
    }
    /**
     * @param int $dcId
     */
    public function __construct(
        public readonly int $dcId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->dcId);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}