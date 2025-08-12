<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updatePinnedDialogs
 */
final class UpdatePinnedDialogs extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xfa0f3ca2;
    
    public string $predicate = 'updatePinnedDialogs';
    
    /**
     * @param int|null $folderId
     * @param list<AbstractDialogPeer>|null $order
     */
    public function __construct(
        public readonly ?int $folderId = null,
        public readonly ?array $order = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->folderId !== null) $flags |= (1 << 1);
        if ($this->order !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int32($this->folderId);
        }
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::vectorOfObjects($this->order);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $folderId = ($flags & (1 << 1)) ? Deserializer::int32($stream) : null;
        $order = ($flags & (1 << 0)) ? Deserializer::vectorOfObjects($stream, [AbstractDialogPeer::class, 'deserialize']) : null;

        return new self(
            $folderId,
            $order
        );
    }
}