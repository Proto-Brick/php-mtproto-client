<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Account;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/account.contentSettings
 */
final class ContentSettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x57e28221;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $sensitiveEnabled = ($flags & (1 << 0)) ? true : null;
        $sensitiveCanChange = ($flags & (1 << 1)) ? true : null;
        return new self(
            $sensitiveEnabled,
            $sensitiveCanChange
        );
    }
}