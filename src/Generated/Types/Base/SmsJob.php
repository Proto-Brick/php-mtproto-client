<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/smsJob
 */
final class SmsJob extends AbstractSmsJob
{
    public const CONSTRUCTOR_ID = 3869372088;
    
    public string $_ = 'smsJob';
    
    /**
     * @param string $jobId
     * @param string $phoneNumber
     * @param string $text
     */
    public function __construct(
        public readonly string $jobId,
        public readonly string $phoneNumber,
        public readonly string $text
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->jobId);
        $buffer .= $serializer->bytes($this->phoneNumber);
        $buffer .= $serializer->bytes($this->text);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $jobId = $deserializer->bytes($stream);
        $phoneNumber = $deserializer->bytes($stream);
        $text = $deserializer->bytes($stream);
            return new self(
            $jobId,
            $phoneNumber,
            $text
        );
    }
}