<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/popularContact
 */
final class PopularContact extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5ce14175;
    
    public string $_ = 'popularContact';
    
    /**
     * @param int $clientId
     * @param int $importers
     */
    public function __construct(
        public readonly int $clientId,
        public readonly int $importers
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->clientId);
        $buffer .= $serializer->int32($this->importers);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $clientId = $deserializer->int64($stream);
        $importers = $deserializer->int32($stream);
        return new self(
            $clientId,
            $importers
        );
    }
}