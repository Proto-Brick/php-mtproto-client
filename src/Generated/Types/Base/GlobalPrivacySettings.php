<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/globalPrivacySettings
 */
final class GlobalPrivacySettings extends TlObject
{
    public const CONSTRUCTOR_ID = 0xfe41b34f;
    
    public string $predicate = 'globalPrivacySettings';
    
    /**
     * @param true|null $archiveAndMuteNewNoncontactPeers
     * @param true|null $keepArchivedUnmuted
     * @param true|null $keepArchivedFolders
     * @param true|null $hideReadMarks
     * @param true|null $newNoncontactPeersRequirePremium
     * @param true|null $displayGiftsButton
     * @param int|null $noncontactPeersPaidStars
     * @param DisallowedGiftsSettings|null $disallowedGifts
     */
    public function __construct(
        public readonly ?true $archiveAndMuteNewNoncontactPeers = null,
        public readonly ?true $keepArchivedUnmuted = null,
        public readonly ?true $keepArchivedFolders = null,
        public readonly ?true $hideReadMarks = null,
        public readonly ?true $newNoncontactPeersRequirePremium = null,
        public readonly ?true $displayGiftsButton = null,
        public readonly ?int $noncontactPeersPaidStars = null,
        public readonly ?DisallowedGiftsSettings $disallowedGifts = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->archiveAndMuteNewNoncontactPeers) {
            $flags |= (1 << 0);
        }
        if ($this->keepArchivedUnmuted) {
            $flags |= (1 << 1);
        }
        if ($this->keepArchivedFolders) {
            $flags |= (1 << 2);
        }
        if ($this->hideReadMarks) {
            $flags |= (1 << 3);
        }
        if ($this->newNoncontactPeersRequirePremium) {
            $flags |= (1 << 4);
        }
        if ($this->displayGiftsButton) {
            $flags |= (1 << 7);
        }
        if ($this->noncontactPeersPaidStars !== null) {
            $flags |= (1 << 5);
        }
        if ($this->disallowedGifts !== null) {
            $flags |= (1 << 6);
        }
        $buffer .= Serializer::int32($flags);
        if ($flags & (1 << 5)) {
            $buffer .= Serializer::int64($this->noncontactPeersPaidStars);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $this->disallowedGifts->serialize();
        }
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = Deserializer::int32($stream);
        $archiveAndMuteNewNoncontactPeers = (($flags & (1 << 0)) !== 0) ? true : null;
        $keepArchivedUnmuted = (($flags & (1 << 1)) !== 0) ? true : null;
        $keepArchivedFolders = (($flags & (1 << 2)) !== 0) ? true : null;
        $hideReadMarks = (($flags & (1 << 3)) !== 0) ? true : null;
        $newNoncontactPeersRequirePremium = (($flags & (1 << 4)) !== 0) ? true : null;
        $displayGiftsButton = (($flags & (1 << 7)) !== 0) ? true : null;
        $noncontactPeersPaidStars = (($flags & (1 << 5)) !== 0) ? Deserializer::int64($stream) : null;
        $disallowedGifts = (($flags & (1 << 6)) !== 0) ? DisallowedGiftsSettings::deserialize($stream) : null;

        return new self(
            $archiveAndMuteNewNoncontactPeers,
            $keepArchivedUnmuted,
            $keepArchivedFolders,
            $hideReadMarks,
            $newNoncontactPeersRequirePremium,
            $displayGiftsButton,
            $noncontactPeersPaidStars,
            $disallowedGifts
        );
    }
}