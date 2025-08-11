<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\TextWithEntities;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.translateResult
 */
final class TranslatedText extends TlObject
{
    public const CONSTRUCTOR_ID = 0x33db32f8;
    
    public string $_ = 'messages.translateResult';
    
    /**
     * @param list<TextWithEntities> $result
     */
    public function __construct(
        public readonly array $result
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::vectorOfObjects($this->result);
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $result = Deserializer::vectorOfObjects($stream, [TextWithEntities::class, 'deserialize']);
        return new self(
            $result
        );
    }
}