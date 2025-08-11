<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateDraftMessage
 */
final class UpdateDraftMessage extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x1b49ec6d;
    
    public string $_ = 'updateDraftMessage';
    
    /**
     * @param AbstractPeer $peer
     * @param AbstractDraftMessage $draft
     * @param int|null $topMsgId
     */
    public function __construct(
        public readonly AbstractPeer $peer,
        public readonly AbstractDraftMessage $draft,
        public readonly ?int $topMsgId = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->topMsgId !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->peer->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int32($this->topMsgId);
        }
        $buffer .= $this->draft->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID is consumed here.
        $flags = Deserializer::int32($stream);

        $peer = AbstractPeer::deserialize($stream);
        $topMsgId = ($flags & (1 << 0)) ? Deserializer::int32($stream) : null;
        $draft = AbstractDraftMessage::deserialize($stream);
        return new self(
            $peer,
            $draft,
            $topMsgId
        );
    }
}