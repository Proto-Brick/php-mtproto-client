<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatInviteImporter
 */
final class ChatInviteImporter extends AbstractChatInviteImporter
{
    public const CONSTRUCTOR_ID = 2354765785;
    
    public string $_ = 'chatInviteImporter';
    
    /**
     * @param int $userId
     * @param int $date
     * @param bool|null $requested
     * @param bool|null $viaChatlist
     * @param string|null $about
     * @param int|null $approvedBy
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $date,
        public readonly ?bool $requested = null,
        public readonly ?bool $viaChatlist = null,
        public readonly ?string $about = null,
        public readonly ?int $approvedBy = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->requested) $flags |= (1 << 0);
        if ($this->viaChatlist) $flags |= (1 << 3);
        if ($this->about !== null) $flags |= (1 << 2);
        if ($this->approvedBy !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int32($this->date);
        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->about);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->int64($this->approvedBy);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $requested = ($flags & (1 << 0)) ? true : null;
        $viaChatlist = ($flags & (1 << 3)) ? true : null;
        $userId = $deserializer->int64($stream);
        $date = $deserializer->int32($stream);
        $about = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        $approvedBy = ($flags & (1 << 1)) ? $deserializer->int64($stream) : null;
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