<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Smsjobs;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/smsjobs.finishJob
 */
final class FinishJobRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4f1ebf24;
    
    public string $predicate = 'smsjobs.finishJob';
    
    public function getMethodName(): string
    {
        return 'smsjobs.finishJob';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param string $jobId
     * @param string|null $error
     */
    public function __construct(
        public readonly string $jobId,
        public readonly ?string $error = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->error !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->jobId);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::bytes($this->error);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}