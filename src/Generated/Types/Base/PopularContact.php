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
    
    public string $predicate = 'popularContact';
    
    /**
     * @param int $clientId
     * @param int $importers
     */
    public function __construct(
        public readonly int $clientId,
        public readonly int $importers
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->clientId);
        $buffer .= Serializer::int32($this->importers);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $clientId = Deserializer::int64($stream);
        $importers = Deserializer::int32($stream);

        return new self(
            $clientId,
            $importers
        );
    }
}