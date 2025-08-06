<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/attachMenuBot
 */
final class AttachMenuBot extends TlObject
{
    public const CONSTRUCTOR_ID = 0xd90d8dfe;
    
    public string $_ = 'attachMenuBot';
    
    /**
     * @param int $botId
     * @param string $shortName
     * @param list<AttachMenuBotIcon> $icons
     * @param bool|null $inactive
     * @param bool|null $hasSettings
     * @param bool|null $requestWriteAccess
     * @param bool|null $showInAttachMenu
     * @param bool|null $showInSideMenu
     * @param bool|null $sideMenuDisclaimerNeeded
     * @param list<AbstractAttachMenuPeerType>|null $peerTypes
     */
    public function __construct(
        public readonly int $botId,
        public readonly string $shortName,
        public readonly array $icons,
        public readonly ?bool $inactive = null,
        public readonly ?bool $hasSettings = null,
        public readonly ?bool $requestWriteAccess = null,
        public readonly ?bool $showInAttachMenu = null,
        public readonly ?bool $showInSideMenu = null,
        public readonly ?bool $sideMenuDisclaimerNeeded = null,
        public readonly ?array $peerTypes = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->inactive) $flags |= (1 << 0);
        if ($this->hasSettings) $flags |= (1 << 1);
        if ($this->requestWriteAccess) $flags |= (1 << 2);
        if ($this->showInAttachMenu) $flags |= (1 << 3);
        if ($this->showInSideMenu) $flags |= (1 << 4);
        if ($this->sideMenuDisclaimerNeeded) $flags |= (1 << 5);
        if ($this->peerTypes !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->botId);
        $buffer .= $serializer->bytes($this->shortName);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->peerTypes);
        }
        $buffer .= $serializer->vectorOfObjects($this->icons);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $inactive = ($flags & (1 << 0)) ? true : null;
        $hasSettings = ($flags & (1 << 1)) ? true : null;
        $requestWriteAccess = ($flags & (1 << 2)) ? true : null;
        $showInAttachMenu = ($flags & (1 << 3)) ? true : null;
        $showInSideMenu = ($flags & (1 << 4)) ? true : null;
        $sideMenuDisclaimerNeeded = ($flags & (1 << 5)) ? true : null;
        $botId = $deserializer->int64($stream);
        $shortName = $deserializer->bytes($stream);
        $peerTypes = ($flags & (1 << 3)) ? $deserializer->vectorOfObjects($stream, [AbstractAttachMenuPeerType::class, 'deserialize']) : null;
        $icons = $deserializer->vectorOfObjects($stream, [AttachMenuBotIcon::class, 'deserialize']);
        return new self(
            $botId,
            $shortName,
            $icons,
            $inactive,
            $hasSettings,
            $requestWriteAccess,
            $showInAttachMenu,
            $showInSideMenu,
            $sideMenuDisclaimerNeeded,
            $peerTypes
        );
    }
}