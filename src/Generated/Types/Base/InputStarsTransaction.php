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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->refund) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::bytes($this->id);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $refund = ($flags & (1 << 0)) ? true : null;
        $id = Deserializer::bytes($stream);
        return new self(
            $id,
            $refund
        );
    }
}