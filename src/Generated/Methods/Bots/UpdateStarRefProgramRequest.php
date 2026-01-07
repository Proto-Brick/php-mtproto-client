<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Methods\Bots;

use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\StarRefProgram;
use ProtoBrick\MTProtoClient\TL\RpcRequest;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/method/bots.updateStarRefProgram
 */
final class UpdateStarRefProgramRequest extends RpcRequest
{
    public const CONSTRUCTOR_ID = 0x778b5ab3;
    
    public string $predicate = 'bots.updateStarRefProgram';
    
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
        if ($this->durationMonths !== null) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::int32($this->commissionPermille);
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->durationMonths);
        }
        return $buffer;
    }
}