<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.importContactToken
 */
final class ImportContactTokenRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x13005788;
    
    public string $_ = 'contacts.importContactToken';
    
    public function getMethodName(): string
    {
        return 'contacts.importContactToken';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUser::class;
    }
    /**
     * @param string $token
     */
    public function __construct(
        public readonly string $token
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->token);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}