<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractWallPaper;
use DigitalStars\MtprotoClient\Generated\Types\Base\WallPaperSettings;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.uploadWallPaper
 */
final class UploadWallPaperRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe39a8f03;
    
    public string $_ = 'account.uploadWallPaper';
    
    public function getMethodName(): string
    {
        return 'account.uploadWallPaper';
    }
    
    public function getResponseClass(): string
    {
        return AbstractWallPaper::class;
    }
    /**
     * @param AbstractInputFile $file
     * @param string $mimeType
     * @param WallPaperSettings $settings
     * @param bool|null $forChat
     */
    public function __construct(
        public readonly AbstractInputFile $file,
        public readonly string $mimeType,
        public readonly WallPaperSettings $settings,
        public readonly ?bool $forChat = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->forChat) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->file->serialize();
        $buffer .= Serializer::bytes($this->mimeType);
        $buffer .= $this->settings->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}