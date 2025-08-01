<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialogFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractExportedChatlistInvite;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatlists.exportedChatlistInvite
 */
final class ExportedChatlistInvite extends AbstractExportedChatlistInvite
{
    public const CONSTRUCTOR_ID = 283567014;
    
    public string $_ = 'chatlists.exportedChatlistInvite';
    
    /**
     * @param AbstractDialogFilter $filter
     * @param AbstractExportedChatlistInvite $invite
     */
    public function __construct(
        public readonly AbstractDialogFilter $filter,
        public readonly AbstractExportedChatlistInvite $invite
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->filter->serialize($serializer);
        $buffer .= $this->invite->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $filter = AbstractDialogFilter::deserialize($deserializer, $stream);
        $invite = AbstractExportedChatlistInvite::deserialize($deserializer, $stream);
            return new self(
            $filter,
            $invite
        );
    }
}