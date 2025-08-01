<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/reportResultAddComment
 */
final class ReportResultAddComment extends AbstractReportResult
{
    public const CONSTRUCTOR_ID = 1862904881;
    
    public string $_ = 'reportResultAddComment';
    
    /**
     * @param string $option
     * @param bool|null $optional
     */
    public function __construct(
        public readonly string $option,
        public readonly ?bool $optional = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->optional) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->option);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $optional = ($flags & (1 << 0)) ? true : null;
        $option = $deserializer->bytes($stream);
            return new self(
            $option,
            $optional
        );
    }
}