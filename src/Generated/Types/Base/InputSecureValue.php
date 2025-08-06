<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputSecureValue
 */
final class InputSecureValue extends TlObject
{
    public const CONSTRUCTOR_ID = 0xdb21d0a7;
    
    public string $_ = 'inputSecureValue';
    
    /**
     * @param AbstractSecureValueType $type
     * @param SecureData|null $data
     * @param AbstractInputSecureFile|null $frontSide
     * @param AbstractInputSecureFile|null $reverseSide
     * @param AbstractInputSecureFile|null $selfie
     * @param list<AbstractInputSecureFile>|null $translation
     * @param list<AbstractInputSecureFile>|null $files
     * @param AbstractSecurePlainData|null $plainData
     */
    public function __construct(
        public readonly AbstractSecureValueType $type,
        public readonly ?SecureData $data = null,
        public readonly ?AbstractInputSecureFile $frontSide = null,
        public readonly ?AbstractInputSecureFile $reverseSide = null,
        public readonly ?AbstractInputSecureFile $selfie = null,
        public readonly ?array $translation = null,
        public readonly ?array $files = null,
        public readonly ?AbstractSecurePlainData $plainData = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->data !== null) $flags |= (1 << 0);
        if ($this->frontSide !== null) $flags |= (1 << 1);
        if ($this->reverseSide !== null) $flags |= (1 << 2);
        if ($this->selfie !== null) $flags |= (1 << 3);
        if ($this->translation !== null) $flags |= (1 << 6);
        if ($this->files !== null) $flags |= (1 << 4);
        if ($this->plainData !== null) $flags |= (1 << 5);
        $buffer .= $serializer->int32($flags);

        $buffer .= $this->type->serialize($serializer);
        if ($flags & (1 << 0)) {
            $buffer .= $this->data->serialize($serializer);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->frontSide->serialize($serializer);
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->reverseSide->serialize($serializer);
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->selfie->serialize($serializer);
        }
        if ($flags & (1 << 6)) {
            $buffer .= $serializer->vectorOfObjects($this->translation);
        }
        if ($flags & (1 << 4)) {
            $buffer .= $serializer->vectorOfObjects($this->files);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->plainData->serialize($serializer);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $type = AbstractSecureValueType::deserialize($deserializer, $stream);
        $data = ($flags & (1 << 0)) ? SecureData::deserialize($deserializer, $stream) : null;
        $frontSide = ($flags & (1 << 1)) ? AbstractInputSecureFile::deserialize($deserializer, $stream) : null;
        $reverseSide = ($flags & (1 << 2)) ? AbstractInputSecureFile::deserialize($deserializer, $stream) : null;
        $selfie = ($flags & (1 << 3)) ? AbstractInputSecureFile::deserialize($deserializer, $stream) : null;
        $translation = ($flags & (1 << 6)) ? $deserializer->vectorOfObjects($stream, [AbstractInputSecureFile::class, 'deserialize']) : null;
        $files = ($flags & (1 << 4)) ? $deserializer->vectorOfObjects($stream, [AbstractInputSecureFile::class, 'deserialize']) : null;
        $plainData = ($flags & (1 << 5)) ? AbstractSecurePlainData::deserialize($deserializer, $stream) : null;
        return new self(
            $type,
            $data,
            $frontSide,
            $reverseSide,
            $selfie,
            $translation,
            $files,
            $plainData
        );
    }
}