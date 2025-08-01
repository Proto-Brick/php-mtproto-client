<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePinnedSavedDialogs
 */
final class UpdatePinnedSavedDialogs extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 1751942566;
    
    public string $_ = 'updatePinnedSavedDialogs';
    
    /**
     * @param list<AbstractDialogPeer>|null $order
     */
    public function __construct(
        public readonly ?array $order = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->order !== null) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= $serializer->vectorOfObjects($this->order);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $order = ($flags & (1 << 0)) ? $deserializer->vectorOfObjects($stream, [AbstractDialogPeer::class, 'deserialize']) : null;
            return new self(
            $order
        );
    }
}