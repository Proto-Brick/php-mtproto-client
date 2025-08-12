<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/exportedMessageLink
 */
final class ExportedMessageLink extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5dab1af4;
    
    public string $predicate = 'exportedMessageLink';
    
    /**
     * @param string $link
     * @param string $html
     */
    public function __construct(
        public readonly string $link,
        public readonly string $html
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->link);
        $buffer .= Serializer::bytes($this->html);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception('Invalid constructor ID for ' . self::class);
        }
        $link = Deserializer::bytes($stream);
        $html = Deserializer::bytes($stream);

        return new self(
            $link,
            $html
        );
    }
}