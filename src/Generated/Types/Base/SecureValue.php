<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/secureValue
 */
final class SecureValue extends TlObject
{
    public const CONSTRUCTOR_ID = 0x187fa0ca;
    
    public string $predicate = 'secureValue';
    
    /**
     * @param SecureValueType $type
     * @param string $hash
     * @param SecureData|null $data
     * @param AbstractSecureFile|null $frontSide
     * @param AbstractSecureFile|null $reverseSide
     * @param AbstractSecureFile|null $selfie
     * @param list<AbstractSecureFile>|null $translation
     * @param list<AbstractSecureFile>|null $files
     * @param AbstractSecurePlainData|null $plainData
     */
    public function __construct(
        public readonly SecureValueType $type,
        public readonly string $hash,
        public readonly ?SecureData $data = null,
        public readonly ?AbstractSecureFile $frontSide = null,
        public readonly ?AbstractSecureFile $reverseSide = null,
        public readonly ?AbstractSecureFile $selfie = null,
        public readonly ?array $translation = null,
        public readonly ?array $files = null,
        public readonly ?AbstractSecurePlainData $plainData = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->data !== null) {
            $flags |= (1 << 0);
        }
        if ($this->frontSide !== null) {
            $flags |= (1 << 1);
        }
        if ($this->reverseSide !== null) {
            $flags |= (1 << 2);
        }
        if ($this->selfie !== null) {
            $flags |= (1 << 3);
        }
        if ($this->translation !== null) {
            $flags |= (1 << 6);
        }
        if ($this->files !== null) {
            $flags |= (1 << 4);
        }
        if ($this->plainData !== null) {
            $flags |= (1 << 5);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= $this->type->serialize();
        if ($flags & (1 << 0)) {
            $buffer .= $this->data->serialize();
        }
        if ($flags & (1 << 1)) {
            $buffer .= $this->frontSide->serialize();
        }
        if ($flags & (1 << 2)) {
            $buffer .= $this->reverseSide->serialize();
        }
        if ($flags & (1 << 3)) {
            $buffer .= $this->selfie->serialize();
        }
        if ($flags & (1 << 6)) {
            $buffer .= Serializer::vectorOfObjects($this->translation);
        }
        if ($flags & (1 << 4)) {
            $buffer .= Serializer::vectorOfObjects($this->files);
        }
        if ($flags & (1 << 5)) {
            $buffer .= $this->plainData->serialize();
        }
        $buffer .= Serializer::bytes($this->hash);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $type = SecureValueType::deserialize($stream);
        $data = (($flags & (1 << 0)) !== 0) ? SecureData::deserialize($stream) : null;
        $frontSide = (($flags & (1 << 1)) !== 0) ? AbstractSecureFile::deserialize($stream) : null;
        $reverseSide = (($flags & (1 << 2)) !== 0) ? AbstractSecureFile::deserialize($stream) : null;
        $selfie = (($flags & (1 << 3)) !== 0) ? AbstractSecureFile::deserialize($stream) : null;
        $translation = (($flags & (1 << 6)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractSecureFile::class, 'deserialize']) : null;
        $files = (($flags & (1 << 4)) !== 0) ? Deserializer::vectorOfObjects($stream, [AbstractSecureFile::class, 'deserialize']) : null;
        $plainData = (($flags & (1 << 5)) !== 0) ? AbstractSecurePlainData::deserialize($stream) : null;
        $hash = Deserializer::bytes($stream);

        return new self(
            $type,
            $hash,
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