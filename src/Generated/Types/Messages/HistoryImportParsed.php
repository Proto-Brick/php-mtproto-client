<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.historyImportParsed
 */
final class HistoryImportParsed extends TlObject
{
    public const CONSTRUCTOR_ID = 0x5e0fb7b9;
    
    public string $_ = 'messages.historyImportParsed';
    
    /**
     * @param bool|null $pm
     * @param bool|null $group
     * @param string|null $title
     */
    public function __construct(
        public readonly ?bool $pm = null,
        public readonly ?bool $group = null,
        public readonly ?string $title = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->pm) $flags |= (1 << 0);
        if ($this->group) $flags |= (1 << 1);
        if ($this->title !== null) $flags |= (1 << 2);
        $buffer .= $serializer->int32($flags);

        if ($flags & (1 << 2)) {
            $buffer .= $serializer->bytes($this->title);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $flags = $deserializer->int32($stream);

        $pm = ($flags & (1 << 0)) ? true : null;
        $group = ($flags & (1 << 1)) ? true : null;
        $title = ($flags & (1 << 2)) ? $deserializer->bytes($stream) : null;
        return new self(
            $pm,
            $group,
            $title
        );
    }
}