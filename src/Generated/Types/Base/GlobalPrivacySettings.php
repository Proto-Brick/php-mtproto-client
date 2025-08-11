<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/globalPrivacySettings
 */
final class GlobalPrivacySettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0x734c4ccb;
    
    public string $_ = 'globalPrivacySettings';
    
    /**
     * @param bool|null $archiveAndMuteNewNoncontactPeers
     * @param bool|null $keepArchivedUnmuted
     * @param bool|null $keepArchivedFolders
     * @param bool|null $hideReadMarks
     * @param bool|null $newNoncontactPeersRequirePremium
     */
    public function __construct(
        public readonly ?bool $archiveAndMuteNewNoncontactPeers = null,
        public readonly ?bool $keepArchivedUnmuted = null,
        public readonly ?bool $keepArchivedFolders = null,
        public readonly ?bool $hideReadMarks = null,
        public readonly ?bool $newNoncontactPeersRequirePremium = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->archiveAndMuteNewNoncontactPeers) $flags |= (1 << 0);
        if ($this->keepArchivedUnmuted) $flags |= (1 << 1);
        if ($this->keepArchivedFolders) $flags |= (1 << 2);
        if ($this->hideReadMarks) $flags |= (1 << 3);
        if ($this->newNoncontactPeersRequirePremium) $flags |= (1 << 4);
        $buffer .= Serializer::int32($flags);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $archiveAndMuteNewNoncontactPeers = ($flags & (1 << 0)) ? true : null;
        $keepArchivedUnmuted = ($flags & (1 << 1)) ? true : null;
        $keepArchivedFolders = ($flags & (1 << 2)) ? true : null;
        $hideReadMarks = ($flags & (1 << 3)) ? true : null;
        $newNoncontactPeersRequirePremium = ($flags & (1 << 4)) ? true : null;
        return new self(
            $archiveAndMuteNewNoncontactPeers,
            $keepArchivedUnmuted,
            $keepArchivedFolders,
            $hideReadMarks,
            $newNoncontactPeersRequirePremium
        );
    }
}