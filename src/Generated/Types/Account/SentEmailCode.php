<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.sentEmailCode
 */
final class SentEmailCode extends TlObject
{
    public const CONSTRUCTOR_ID = 0x811f854f;
    
    public string $_ = 'account.sentEmailCode';
    
    /**
     * @param string $emailPattern
     * @param int $length
     */
    public function __construct(
        public readonly string $emailPattern,
        public readonly int $length
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->emailPattern);
        $buffer .= $serializer->int32($this->length);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $emailPattern = $deserializer->bytes($stream);
        $length = $deserializer->int32($stream);
        return new self(
            $emailPattern,
            $length
        );
    }
}