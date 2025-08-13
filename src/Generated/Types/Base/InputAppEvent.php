<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputAppEvent
 */
final class InputAppEvent extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1d1b1245;
    
    public string $predicate = 'inputAppEvent';
    
    /**
     * @param float $time
     * @param string $type
     * @param int $peer
     * @param array $data
     */
    public function __construct(
        public readonly float $time,
        public readonly string $type,
        public readonly int $peer,
        public readonly array $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->time);
        $buffer .= Serializer::bytes($this->type);
        $buffer .= Serializer::int64($this->peer);
        $buffer .= Serializer::serializeJsonValue($this->data);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $time = Deserializer::double($stream);
        $type = Deserializer::bytes($stream);
        $peer = Deserializer::int64($stream);
        $data = Deserializer::deserializeJsonValue($stream);

        return new self(
            $time,
            $type,
            $peer,
            $data
        );
    }
}