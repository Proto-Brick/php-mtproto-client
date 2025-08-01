<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractDialogFilter;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/messages.dialogFilters
 */
final class DialogFilters extends AbstractDialogFilters
{
    public const CONSTRUCTOR_ID = 718878489;
    
    public string $_ = 'messages.dialogFilters';
    
    /**
     * @param list<AbstractDialogFilter> $filters
     * @param bool|null $tagsEnabled
     */
    public function __construct(
        public readonly array $filters,
        public readonly ?bool $tagsEnabled = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->tagsEnabled) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->vectorOfObjects($this->filters);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $tagsEnabled = ($flags & (1 << 0)) ? true : null;
        $filters = $deserializer->vectorOfObjects($stream, [AbstractDialogFilter::class, 'deserialize']);
            return new self(
            $filters,
            $tagsEnabled
        );
    }
}