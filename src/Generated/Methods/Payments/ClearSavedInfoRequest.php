<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Payments;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/payments.clearSavedInfo
 */
final class ClearSavedInfoRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd83d70c1;
    
    public string $_ = 'payments.clearSavedInfo';
    
    public function getMethodName(): string
    {
        return 'payments.clearSavedInfo';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool|null $credentials
     * @param bool|null $info
     */
    public function __construct(
        public readonly ?bool $credentials = null,
        public readonly ?bool $info = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->credentials) $flags |= (1 << 0);
        if ($this->info) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}