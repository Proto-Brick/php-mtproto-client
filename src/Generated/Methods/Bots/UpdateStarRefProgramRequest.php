<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractStarRefProgram;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.updateStarRefProgram
 */
final class UpdateStarRefProgramRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2005621427;
    
    public string $_ = 'bots.updateStarRefProgram';
    
    public function getMethodName(): string
    {
        return 'bots.updateStarRefProgram';
    }
    
    public function getResponseClass(): string
    {
        return AbstractStarRefProgram::class;
    }
    /**
     * @param AbstractInputUser $bot
     * @param int $commissionPermille
     * @param int|null $durationMonths
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly int $commissionPermille,
        public readonly ?int $durationMonths = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->durationMonths !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $serializer->int32($this->commissionPermille);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->int32($this->durationMonths);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}