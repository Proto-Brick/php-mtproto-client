<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Account;

use ProtoBrick\MTProtoClient\Generated\Types\Base\Theme;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/account.themes
 */
final class Themes extends AbstractThemes
{
    public const CONSTRUCTOR_ID = 0x9a3d8c6d;
    
    public string $predicate = 'account.themes';
    
    /**
     * @param int $hash
     * @param list<Theme> $themes
     */
    public function __construct(
        public readonly int $hash,
        public readonly array $themes
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int64($this->hash);
        $buffer .= Serializer::vectorOfObjects($this->themes);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $hash = unpack('q', substr($stream, 0, 8))[1];
        $stream = substr($stream, 8);
        $themes = Deserializer::vectorOfObjects($stream, [Theme::class, 'deserialize']);

        return new self(
            $hash,
            $themes
        );
    }
}