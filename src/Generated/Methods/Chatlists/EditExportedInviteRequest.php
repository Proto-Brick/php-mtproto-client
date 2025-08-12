<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\ExportedChatlistInvite;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatlist;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.editExportedInvite
 */
final class EditExportedInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x653db63d;
    
    public string $predicate = 'chatlists.editExportedInvite';
    
    public function getMethodName(): string
    {
        return 'chatlists.editExportedInvite';
    }
    
    public function getResponseClass(): string
    {
        return ExportedChatlistInvite::class;
    }
    /**
     * @param InputChatlist $chatlist
     * @param string $slug
     * @param string|null $title
     * @param list<AbstractInputPeer>|null $peers
     */
    public function __construct(
        public readonly InputChatlist $chatlist,
        public readonly string $slug,
        public readonly ?string $title = null,
        public readonly ?array $peers = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->title !== null) $flags |= (1 << 1);
        if ($this->peers !== null) $flags |= (1 << 2);
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->chatlist->serialize();
        $buffer .= Serializer::bytes($this->slug);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->title);
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::vectorOfObjects($this->peers);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}