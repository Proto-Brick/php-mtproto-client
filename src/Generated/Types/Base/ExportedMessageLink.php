<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

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
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $link = Deserializer::bytes($stream);
        $html = Deserializer::bytes($stream);

        return new self(
            $link,
            $html
        );
    }
}