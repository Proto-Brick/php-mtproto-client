<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputStarsTransaction
 */
final class InputStarsTransaction extends TlObject
{
    public const CONSTRUCTOR_ID = 0x206ae6d1;
    
    public string $_ = 'inputStarsTransaction';
    
    /**
     * @param string $id
     * @param bool|null $refund
     */
    public function __construct(
        public readonly string $id,
        public readonly ?bool $refund = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->refund) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $refund = ($flags & (1 << 0)) ? true : null;
        $id = $deserializer->bytes($stream);
        return new self(
            $id,
            $refund
        );
    }
}