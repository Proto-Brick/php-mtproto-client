<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputChatlist;
use DigitalStars\MtprotoClient\Generated\Types\Chatlists\AbstractExportedInvites;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/chatlists.getExportedInvites
 */
final class GetExportedInvitesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3456359043;
    
    public string $_ = 'chatlists.getExportedInvites';
    
    public function getMethodName(): string
    {
        return 'chatlists.getExportedInvites';
    }
    
    public function getResponseClass(): string
    {
        return AbstractExportedInvites::class;
    }
    /**
     * @param AbstractInputChatlist $chatlist
     */
    public function __construct(
        public readonly AbstractInputChatlist $chatlist
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