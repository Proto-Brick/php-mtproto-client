<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/importedContact
 */
final class ImportedContact extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc13e3c50;
    
    public string $_ = 'importedContact';
    
    /**
     * @param int $userId
     * @param int $clientId
     */
    public function __construct(
        public readonly int $userId,
        public readonly int $clientId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->userId);
        $buffer .= $serializer->int64($this->clientId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $userId = $deserializer->int64($stream);
        $clientId = $deserializer->int64($stream);
        return new self(
            $userId,
            $clientId
        );
    }
}