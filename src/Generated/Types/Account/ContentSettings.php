<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.contentSettings
 */
final class ContentSettings extends AbstractContentSettings
{
    public const CONSTRUCTOR_ID = 1474462241;
    
    public string $_ = 'account.contentSettings';
    
    /**
     * @param bool|null $sensitiveEnabled
     * @param bool|null $sensitiveCanChange
     */
    public function __construct(
        public readonly ?bool $sensitiveEnabled = null,
        public readonly ?bool $sensitiveCanChange = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->sensitiveEnabled) $flags |= (1 << 0);
        if ($this->sensitiveCanChange) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $sensitiveEnabled = ($flags & (1 << 0)) ? true : null;
        $sensitiveCanChange = ($flags & (1 << 1)) ? true : null;
            return new self(
            $sensitiveEnabled,
            $sensitiveCanChange
        );
    }
}