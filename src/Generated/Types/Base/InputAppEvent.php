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
    
    public string $_ = 'inputAppEvent';
    
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
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= pack('d', $this->time);
        $buffer .= $serializer->bytes($this->type);
        $buffer .= $serializer->int64($this->peer);
        $buffer .= (new DataJSON(json_encode($this->data, JSON_FORCE_OBJECT)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $time = $deserializer->double($stream);
        $type = $deserializer->bytes($stream);
        $peer = $deserializer->int64($stream);
        $data = $deserializer->deserializeJsonValue($stream);
        return new self(
            $time,
            $type,
            $peer,
            $data
        );
    }
}