<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatlist;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\ExportedChatlistInvite;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.exportChatlistInvite
 */
final class ExportChatlistInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x8472478e;
    
    public string $_ = 'chatlists.exportChatlistInvite';
    
    public function getMethodName(): string
    {
        return 'chatlists.exportChatlistInvite';
    }
    
    public function getResponseClass(): string
    {
        return ExportedChatlistInvite::class;
    }
    /**
     * @param InputChatlist $chatlist
     * @param string $title
     * @param list<AbstractInputPeer> $peers
     */
    public function __construct(
        public readonly InputChatlist $chatlist,
        public readonly string $title,
        public readonly array $peers
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize($serializer);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->vectorOfObjects($this->peers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}