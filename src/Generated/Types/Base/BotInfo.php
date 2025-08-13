<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/botInfo
 */
final class BotInfo extends TlObject
{
    public const CONSTRUCTOR_ID = 0x4d8a0299;
    
    public string $predicate = 'botInfo';
    
    /**
     * @param true|null $hasPreviewMedias
     * @param int|null $userId
     * @param string|null $description
     * @param AbstractPhoto|null $descriptionPhoto
     * @param AbstractDocument|null $descriptionDocument
     * @param list<BotCommand>|null $commands
     * @param AbstractBotMenuButton|null $menuButton
     * @param string|null $privacyPolicyUrl
     * @param BotAppSettings|null $appSettings
     * @param BotVerifierSettings|null $verifierSettings
     */
    public function __construct(
        public readonly ?true $hasPreviewMedias = null,
        public readonly ?int $userId = null,
        public readonly ?string $description = null,
        public readonly ?AbstractPhoto $descriptionPhoto = null,
        public readonly ?AbstractDocument $descriptionDocument = null,
        public readonly ?array $commands = null,
        public readonly ?AbstractBotMenuButton $menuButton = null,
        public readonly ?string $privacyPolicyUrl = null,
        public readonly ?BotAppSettings $appSettings = null,
        public readonly ?BotVerifierSettings $verifierSettings = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->hasPreviewMedias) {
            $flags |= (1 << 6);
        }
        if ($this->userId !== null) {
            $flags |= (1 << 0);
        }
        if ($this->description !== null) {
            $flags |= (1 << 1);
        }
        if ($this->descriptionPhoto !== null) {
            $flags |= (1 << 4);
        }
        if ($this->descriptionDocument !== null) {
            $flags |= (1 << 5);
        }
        if ($this->commands !== null) {
            $flags |= (1 << 2);
        }
        if ($this->menuButton !== null) {
            $flags |= (1 << 3);
        }
        if ($this->privacyPolicyUrl !== null) {
            $flags |= (1 << 7);
        }
        if ($this->appSettings !== null) {
            $flags |= (1 << 8);
        }
        if ($this->verifierSettings !== null) {
            $flags |= (1 << 9);
        }
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
        if ($flags & (1 << 9)) {
            $buffer .= $this->verifierSettings->serialize();
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
        $hasPreviewMedias = (($flags & (1 << 6)) !== 0) ? true : null;
        $userId = (($flags & (1 << 0)) !== 0) ? Deserializer::int64($stream) : null;
        $description = (($flags & (1 << 1)) !== 0) ? Deserializer::bytes($stream) : null;
        $descriptionPhoto = (($flags & (1 << 4)) !== 0) ? AbstractPhoto::deserialize($stream) : null;
        $descriptionDocument = (($flags & (1 << 5)) !== 0) ? AbstractDocument::deserialize($stream) : null;
        $commands = (($flags & (1 << 2)) !== 0) ? Deserializer::vectorOfObjects($stream, [BotCommand::class, 'deserialize']) : null;
        $menuButton = (($flags & (1 << 3)) !== 0) ? AbstractBotMenuButton::deserialize($stream) : null;
        $privacyPolicyUrl = (($flags & (1 << 7)) !== 0) ? Deserializer::bytes($stream) : null;
        $appSettings = (($flags & (1 << 8)) !== 0) ? BotAppSettings::deserialize($stream) : null;
        $verifierSettings = (($flags & (1 << 9)) !== 0) ? BotVerifierSettings::deserialize($stream) : null;

        return new self(
            $hasPreviewMedias,
            $userId,
            $description,
            $descriptionPhoto,
            $descriptionDocument,
            $commands,
            $menuButton,
            $privacyPolicyUrl,
            $appSettings,
            $verifierSettings
        );
    }
}