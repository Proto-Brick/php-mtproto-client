<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatlist;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.deleteExportedInvite
 */
final class DeleteExportedInviteRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x719c5c5e;
    
    public string $_ = 'chatlists.deleteExportedInvite';
    
    public function getMethodName(): string
    {
        return 'chatlists.deleteExportedInvite';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param InputChatlist $chatlist
     * @param string $slug
     */
    public function __construct(
        public readonly InputChatlist $chatlist,
        public readonly string $slug
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize($serializer);
        $buffer .= $serializer->bytes($this->slug);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}