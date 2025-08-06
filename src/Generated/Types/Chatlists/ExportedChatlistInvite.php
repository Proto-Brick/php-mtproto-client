<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Chatlists;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialogFilter;
use DigitalStars\MtprotoClient\Generated\Types\Base\ExportedChatlistInvite as BaseExportedChatlistInvite;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/chatlists.exportedChatlistInvite
 */
final class ExportedChatlistInvite extends TlObject
{
    public const CONSTRUCTOR_ID = 0x10e6e3a6;
    
    public string $_ = 'chatlists.exportedChatlistInvite';
    
    /**
     * @param AbstractDialogFilter $filter
     * @param BaseExportedChatlistInvite $invite
     */
    public function __construct(
        public readonly AbstractDialogFilter $filter,
        public readonly BaseExportedChatlistInvite $invite
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
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $filter = AbstractDialogFilter::deserialize($deserializer, $stream);
        $invite = BaseExportedChatlistInvite::deserialize($deserializer, $stream);
        return new self(
            $filter,
            $invite
        );
    }
}