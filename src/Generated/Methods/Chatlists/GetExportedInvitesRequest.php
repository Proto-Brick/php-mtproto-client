<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\InputChatlist;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\ExportedInvites;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.getExportedInvites
 */
final class GetExportedInvitesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xce03da83;
    
    public string $_ = 'chatlists.getExportedInvites';
    
    public function getMethodName(): string
    {
        return 'chatlists.getExportedInvites';
    }
    
    public function getResponseClass(): string
    {
        return ExportedInvites::class;
    }
    /**
     * @param InputChatlist $chatlist
     */
    public function __construct(
        public readonly InputChatlist $chatlist
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->chatlist->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}