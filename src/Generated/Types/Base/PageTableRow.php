<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/pageTableRow
 */
final class PageTableRow extends TlObject
{
    public const CONSTRUCTOR_ID = 0xe0c0c5e5;
    
    public string $_ = 'pageTableRow';
    
    /**
     * @param list<PageTableCell> $cells
     */
    public function __construct(
        public readonly array $cells
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->cells);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $cells = Deserializer::vectorOfObjects($stream, [PageTableCell::class, 'deserialize']);
        return new self(
            $cells
        );
    }
}