<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/smsJob
 */
final class SmsJob extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe6a1eeb8;
    
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

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