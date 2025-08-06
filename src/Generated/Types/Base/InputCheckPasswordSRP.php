<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputCheckPasswordSRP
 */
final class InputCheckPasswordSRP extends AbstractInputCheckPasswordSRP
{
    public const CONSTRUCTOR_ID = 0xd27ff082;
    
    public string $_ = 'inputCheckPasswordSRP';
    
    /**
     * @param int $srpId
     * @param string $a
     * @param string $m1
     */
    public function __construct(
        public readonly int $srpId,
        public readonly string $a,
        public readonly string $m1
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->srpId);
        $buffer .= $serializer->bytes($this->a);
        $buffer .= $serializer->bytes($this->m1);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $srpId = $deserializer->int64($stream);
        $a = $deserializer->bytes($stream);
        $m1 = $deserializer->bytes($stream);
        return new self(
            $srpId,
            $a,
            $m1
        );
    }
}