<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputAppEvent
 */
final class InputAppEvent extends AbstractInputAppEvent
{
    public const CONSTRUCTOR_ID = 488313413;
    
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
        $buffer .= (new DataJSON(json_encode($this->data)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $time = $deserializer->double($stream);
        $type = $deserializer->bytes($stream);
        $peer = $deserializer->int64($stream);
        $data = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
            return new self(
            $time,
            $type,
            $peer,
            $data
        );
    }
}