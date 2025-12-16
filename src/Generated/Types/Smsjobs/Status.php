<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Smsjobs;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/smsjobs.status
 */
final class Status extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2aee9191;
    
    public string $predicate = 'smsjobs.status';
    
    /**
     * @param int $recentSent
     * @param int $recentSince
     * @param int $recentRemains
     * @param int $totalSent
     * @param int $totalSince
     * @param string $termsUrl
     * @param true|null $allowInternational
     * @param string|null $lastGiftSlug
     */
    public function __construct(
        public readonly int $recentSent,
        public readonly int $recentSince,
        public readonly int $recentRemains,
        public readonly int $totalSent,
        public readonly int $totalSince,
        public readonly string $termsUrl,
        public readonly ?true $allowInternational = null,
        public readonly ?string $lastGiftSlug = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowInternational) {
            $flags |= (1 << 0);
        }
        if ($this->lastGiftSlug !== null) {
            $flags |= (1 << 1);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->recentSent);
        $buffer .= Serializer::int32($this->recentSince);
        $buffer .= Serializer::int32($this->recentRemains);
        $buffer .= Serializer::int32($this->totalSent);
        $buffer .= Serializer::int32($this->totalSince);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->lastGiftSlug);
        }
        $buffer .= Serializer::bytes($this->termsUrl);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $allowInternational = (($flags & (1 << 0)) !== 0) ? true : null;
        $recentSent = Deserializer::int32($stream);
        $recentSince = Deserializer::int32($stream);
        $recentRemains = Deserializer::int32($stream);
        $totalSent = Deserializer::int32($stream);
        $totalSince = Deserializer::int32($stream);
        $lastGiftSlug = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $termsUrl = Deserializer::bytes($stream);

        return new self(
            $recentSent,
            $recentSince,
            $recentRemains,
            $totalSent,
            $totalSince,
            $termsUrl,
            $allowInternational,
            $lastGiftSlug
        );
    }
}