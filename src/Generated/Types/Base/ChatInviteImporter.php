<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatInviteImporter
 */
final class ChatInviteImporter extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8c5adfd9;
    
    public string $predicate = 'chatInviteImporter';
    
    /**
     * @param int $userId
     * @param int $date
     * @param true|null $requested
     * @param true|null $viaChatlist
     * @param string|null $about
     * @param int|null $approvedBy
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date,
        public readonly ?true $requested = null,
        public readonly ?true $viaChatlist = null,
        public readonly ?string $about = null,
        public readonly ?int $approvedBy = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requested) $flags |= (1 << 0);
        if ($this->viaChatlist) $flags |= (1 << 3);
        if ($this->about !== null) $flags |= (1 << 2);
        if ($this->approvedBy !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::int64($this->userId);
        $buffer .= Serializer::int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::bytes($this->about);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::int64($this->approvedBy);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $requested = ($flags & (1 << 0)) ? true : null;
        $viaChatlist = ($flags & (1 << 3)) ? true : null;
        $userId = Deserializer::int64($stream);
        $date = Deserializer::int32($stream);
        $about = ($flags & (1 << 2)) ? Deserializer::bytes($stream) : null;
        $approvedBy = ($flags & (1 << 1)) ? Deserializer::int64($stream) : null;

        return new self(
            $userId,
            $date,
            $requested,
            $viaChatlist,
            $about,
            $approvedBy
        );
    }
}