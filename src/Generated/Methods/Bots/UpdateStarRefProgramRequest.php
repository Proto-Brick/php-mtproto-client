<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\StarRefProgram;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.updateStarRefProgram
 */
final class UpdateStarRefProgramRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x778b5ab3;
    
    public string $_ = 'bots.updateStarRefProgram';
    
    public function getMethodName(): string
    {
        return 'bots.updateStarRefProgram';
    }
    
    public function getResponseClass(): string
    {
        return StarRefProgram::class;
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
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->durationMonths !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::int32($this->commissionPermille);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->durationMonths);
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}