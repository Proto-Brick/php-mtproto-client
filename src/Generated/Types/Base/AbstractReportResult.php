<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Base;

use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;


/**
 * @see https://core.telegram.org/type/ReportResult
 */
abstract class AbstractReportResult extends TlObject
{
    public static function deserialize(string &$stream): static
    {
        // Peek at the constructor ID to determine the concrete type
        $constructorId = Deserializer::peekInt32($stream);
        
        return match ($constructorId) {
            0xf0e4e0b6 => ReportResultChooseOption::deserialize($stream),
            0x6f09ac31 => ReportResultAddComment::deserialize($stream),
            0x8db33c4b => ReportResultReported::deserialize($stream),
            default => throw new RuntimeException(sprintf('Unknown constructor ID for type ReportResult. Received ID: 0x%s (signed: %d, unsigned: %u)', dechex($constructorId), unpack('l', pack('V', $constructorId))[1], $constructorId)),
        };
    }
}