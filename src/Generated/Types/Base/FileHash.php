<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/fileHash
 */
final class FileHash extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf39b035c;
    
    public string $_ = 'fileHash';
    
    /**
     * @param int $offset
     * @param int $limit
     * @param string $hash
     */
    public function __construct(
        public readonly int $offset,
        public readonly int $limit,
        public readonly string $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->offset);
        $buffer .= $serializer->int32($this->limit);
        $buffer .= $serializer->bytes($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $offset = $deserializer->int64($stream);
        $limit = $deserializer->int32($stream);
        $hash = $deserializer->bytes($stream);
        return new self(
            $offset,
            $limit,
            $hash
        );
    }
}