<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/exportedStoryLink
 */
final class ExportedStoryLink extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3fc9053b;
    
    public string $predicate = 'exportedStoryLink';
    
    /**
     * @param string $link
     */
    public function __construct(
        public readonly string $link
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->link);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $link = Deserializer::bytes($stream);

        return new self(
            $link
        );
    }
}