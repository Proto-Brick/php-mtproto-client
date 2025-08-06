<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateSmsJob
 */
final class UpdateSmsJob extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf16269d4;
    
    public string $_ = 'updateSmsJob';
    
    /**
     * @param string $jobId
     */
    public function __construct(
        public readonly string $jobId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->jobId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $jobId = $deserializer->bytes($stream);
        return new self(
            $jobId
        );
    }
}