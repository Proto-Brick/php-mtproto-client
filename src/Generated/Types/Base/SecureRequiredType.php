<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/secureRequiredType
 */
final class SecureRequiredType extends AbstractSecureRequiredType
{
    public const CONSTRUCTOR_ID = 0x829d99da;
    
    public string $_ = 'secureRequiredType';
    
    /**
     * @param AbstractSecureValueType $type
     * @param bool|null $nativeNames
     * @param bool|null $selfieRequired
     * @param bool|null $translationRequired
     */
    public function __construct(
        public readonly AbstractSecureValueType $type,
        public readonly ?bool $nativeNames = null,
        public readonly ?bool $selfieRequired = null,
        public readonly ?bool $translationRequired = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->nativeNames) $flags |= (1 << 0);
        if ($this->selfieRequired) $flags |= (1 << 1);
        if ($this->translationRequired) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->type->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $nativeNames = ($flags & (1 << 0)) ? true : null;
        $selfieRequired = ($flags & (1 << 1)) ? true : null;
        $translationRequired = ($flags & (1 << 2)) ? true : null;
        $type = AbstractSecureValueType::deserialize($deserializer, $stream);
        return new self(
            $type,
            $nativeNames,
            $selfieRequired,
            $translationRequired
        );
    }
}