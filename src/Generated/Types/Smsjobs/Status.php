<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Smsjobs;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/smsjobs.status
 */
final class Status extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2aee9191;
    
    public string $_ = 'smsjobs.status';
    
    /**
     * @param int $recentSent
     * @param int $recentSince
     * @param int $recentRemains
     * @param int $totalSent
     * @param int $totalSince
     * @param string $termsUrl
     * @param bool|null $allowInternational
     * @param string|null $lastGiftSlug
     */
    public function __construct(
        public readonly int $recentSent,
        public readonly int $recentSince,
        public readonly int $recentRemains,
        public readonly int $totalSent,
        public readonly int $totalSince,
        public readonly string $termsUrl,
        public readonly ?bool $allowInternational = null,
        public readonly ?string $lastGiftSlug = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowInternational) $flags |= (1 << 0);
        if ($this->lastGiftSlug !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int32($this->recentSent);
        $buffer .= $serializer->int32($this->recentSince);
        $buffer .= $serializer->int32($this->recentRemains);
        $buffer .= $serializer->int32($this->totalSent);
        $buffer .= $serializer->int32($this->totalSince);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->bytes($this->lastGiftSlug);
        }
        $buffer .= $serializer->bytes($this->termsUrl);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $allowInternational = ($flags & (1 << 0)) ? true : null;
        $recentSent = $deserializer->int32($stream);
        $recentSince = $deserializer->int32($stream);
        $recentRemains = $deserializer->int32($stream);
        $totalSent = $deserializer->int32($stream);
        $totalSince = $deserializer->int32($stream);
        $lastGiftSlug = ($flags & (1 << 1)) ? $deserializer->bytes($stream) : null;
        $termsUrl = $deserializer->bytes($stream);
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