<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/botInfo
 */
final class BotInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x36607333;
    
    public string $_ = 'botInfo';
    
    /**
     * @param bool|null $hasPreviewMedias
     * @param int|null $userId
     * @param string|null $description
     * @param AbstractPhoto|null $descriptionPhoto
     * @param AbstractDocument|null $descriptionDocument
     * @param list<BotCommand>|null $commands
     * @param AbstractBotMenuButton|null $menuButton
     * @param string|null $privacyPolicyUrl
     * @param BotAppSettings|null $appSettings
     */
    public function __construct(
        public readonly ?bool $hasPreviewMedias = null,
        public readonly ?int $userId = null,
        public readonly ?string $description = null,
        public readonly ?AbstractPhoto $descriptionPhoto = null,
        public readonly ?AbstractDocument $descriptionDocument = null,
        public readonly ?array $commands = null,
        public readonly ?AbstractBotMenuButton $menuButton = null,
        public readonly ?string $privacyPolicyUrl = null,
        public readonly ?BotAppSettings $appSettings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasPreviewMedias) $flags |= (1 << 6);
        if ($this->userId !== null) $flags |= (1 << 0);
        if ($this->description !== null) $flags |= (1 << 1);
        if ($this->descriptionPhoto !== null) $flags |= (1 << 4);
        if ($this->descriptionDocument !== null) $flags |= (1 << 5);
        if ($this->commands !== null) $flags |= (1 << 2);
        if ($this->menuButton !== null) $flags |= (1 << 3);
        if ($this->privacyPolicyUrl !== null) $flags |= (1 << 7);
        if ($this->appSettings !== null) $flags |= (1 << 8);
        $buffer .= Serializer::int32($flags);

        if ($flags & (1 << 0)) {
            $buffer .= Serializer::int64($this->userId);
        }
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::bytes($this->description);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $this->descriptionPhoto->serialize();
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->descriptionDocument->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= Serializer::vectorOfObjects($this->commands);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->menuButton->serialize();
        }
        if ($flags & (1 << 7)) {
            $buffer .= Serializer::bytes($this->privacyPolicyUrl);
        }
        if ($flags & (1 << 8)) {
            $buffer .= $this->appSettings->serialize();
        }
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = Deserializer::int32($stream);

        $hasPreviewMedias = ($flags & (1 << 6)) ? true : null;
        $userId = ($flags & (1 << 0)) ? Deserializer::int64($stream) : null;
        $description = ($flags & (1 << 1)) ? Deserializer::bytes($stream) : null;
        $descriptionPhoto = ($flags & (1 << 4)) ? AbstractPhoto::deserialize($stream) : null;
        $descriptionDocument = ($flags & (1 << 5)) ? AbstractDocument::deserialize($stream) : null;
        $commands = ($flags & (1 << 2)) ? Deserializer::vectorOfObjects($stream, [BotCommand::class, 'deserialize']) : null;
        $menuButton = ($flags & (1 << 3)) ? AbstractBotMenuButton::deserialize($stream) : null;
        $privacyPolicyUrl = ($flags & (1 << 7)) ? Deserializer::bytes($stream) : null;
        $appSettings = ($flags & (1 << 8)) ? BotAppSettings::deserialize($stream) : null;
        return new self(
            $hasPreviewMedias,
            $userId,
            $description,
            $descriptionPhoto,
            $descriptionDocument,
            $commands,
            $menuButton,
            $privacyPolicyUrl,
            $appSettings
        );
    }
}