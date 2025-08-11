<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Smsjobs;

use DigitalStars\MtprotoClient\Generated\Types\Base\SmsJob;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/smsjobs.getSmsJob
 */
final class GetSmsJobRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x778d902f;
    
    public string $_ = 'smsjobs.getSmsJob';
    
    public function getMethodName(): string
    {
        return 'smsjobs.getSmsJob';
    }
    
    public function getResponseClass(): string
    {
        return SmsJob::class;
    }
    /**
     * @param string $jobId
     */
    public function __construct(
        public readonly string $jobId
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->jobId);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}