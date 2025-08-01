<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDocument;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputFile;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.uploadRingtone
 */
final class UploadRingtoneRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2199552930;
    
    public string $_ = 'account.uploadRingtone';
    
    public function getMethodName(): string
    {
        return 'account.uploadRingtone';
    }
    
    public function getResponseClass(): string
    {
        return AbstractDocument::class;
    }
    /**
     * @param AbstractInputFile $file
     * @param string $fileName
     * @param string $mimeType
     */
    public function __construct(
        public readonly AbstractInputFile $file,
        public readonly string $fileName,
        public readonly string $mimeType
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->file->serialize($serializer);
        $buffer .= $serializer->bytes($this->fileName);
        $buffer .= $serializer->bytes($this->mimeType);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}