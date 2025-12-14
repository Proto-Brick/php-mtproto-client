<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;

/**
 * @see https://core.telegram.org/type/reportResultAddComment
 */
final class ReportResultAddComment extends AbstractReportResult
{
    public const CONSTRUCTOR_ID = 0x6f09ac31;
    
    public string $predicate = 'reportResultAddComment';
    
    /**
     * @param string $option
     * @param true|null $optional
     */
    public function __construct(
        public readonly string $option,
        public readonly ?true $optional = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->optional) {
            $flags |= (1 << 0);
        }
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->option);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = unpack('V', substr($stream, 0, 4))[1];
        $stream = substr($stream, 4);
        $optional = (($flags & (1 << 0)) !== 0) ? true : null;
        $option = Deserializer::bytes($stream);

        return new self(
            $option,
            $optional
        );
    }
}