<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.uploadTheme
 */
final class UploadThemeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1c3db333;
    
    public string $_ = 'account.uploadTheme';
    
    public function getMethodName(): string
    {
        return 'account.uploadTheme';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDocument::class;
    }
    /**
     * @param AbstractInputFile $file
     * @param string $fileName
     * @param string $mimeType
     * @param AbstractInputFile|null $thumb
     */
    public function __construct(
        public readonly AbstractInputFile $file,
        public readonly string $fileName,
        public readonly string $mimeType,
        public readonly ?AbstractInputFile $thumb = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->thumb !== null) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->file->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->thumb->serialize();
        }
        $buffer .= Serializer::bytes($this->fileName);
        $buffer .= Serializer::bytes($this->mimeType);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}