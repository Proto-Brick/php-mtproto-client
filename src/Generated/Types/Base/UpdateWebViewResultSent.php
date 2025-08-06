<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateWebViewResultSent
 */
final class UpdateWebViewResultSent extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0x1592b79d;
    
    public string $_ = 'updateWebViewResultSent';
    
    /**
     * @param int $queryId
     */
    public function __construct(
        public readonly int $queryId
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->int64($this->queryId);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $queryId = $deserializer->int64($stream);
        return new self(
            $queryId
        );
    }
}