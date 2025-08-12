<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Updates;

use DigitalStars\MtprotoClient\Generated\Types\Updates\AbstractDifference;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/updates.getDifference
 */
final class GetDifferenceRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x19c2f763;
    
    public string $predicate = 'updates.getDifference';
    
    public function getMethodName(): string
    {
        return 'updates.getDifference';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDifference::class;
    }
    /**
     * @param int $pts
     * @param int $date
     * @param int $qts
     * @param int|null $ptsLimit
     * @param int|null $ptsTotalLimit
     * @param int|null $qtsLimit
     */
    public function __construct(
        public readonly int $pts,
        public readonly int $date,
        public readonly int $qts,
        public readonly ?int $ptsLimit = null,
        public readonly ?int $ptsTotalLimit = null,
        public readonly ?int $qtsLimit = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->ptsLimit !== null) $flags |= (1 << 1);
        if ($this->ptsTotalLimit !== null) $flags |= (1 << 0);
        if ($this->qtsLimit !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int32($this->pts);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->ptsLimit);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->ptsTotalLimit);
        }
        $buffer .= Serializer::int32($this->date);
        $buffer .= Serializer::int32($this->qts);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::int32($this->qtsLimit);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}