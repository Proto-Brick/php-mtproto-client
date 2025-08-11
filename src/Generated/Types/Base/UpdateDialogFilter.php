<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateDialogFilter
 */
final class UpdateDialogFilter extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x26ffde7d;
    
    public string $_ = 'updateDialogFilter';
    
    /**
     * @param int $id
     * @param AbstractDialogFilter|null $filter
     */
    public function __construct(
        public readonly int $id,
        public readonly ?AbstractDialogFilter $filter = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->filter !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= Serializer::int32($this->id);
        if ($flags & (1 << 0)) {
            $buffer .= $this->filter->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $id = Deserializer::int32($stream);
        $filter = ($flags & (1 << 0)) ? AbstractDialogFilter::deserialize($stream) : null;
        return new self(
            $id,
            $filter
        );
    }
}