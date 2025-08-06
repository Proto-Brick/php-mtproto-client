<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateQuickReplies
 */
final class UpdateQuickReplies extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 0xf9470ab2;
    
    public string $_ = 'updateQuickReplies';
    
    /**
     * @param list<QuickReply> $quickReplies
     */
    public function __construct(
        public readonly array $quickReplies
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfObjects($this->quickReplies);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $quickReplies = $deserializer->vectorOfObjects($stream, [QuickReply::class, 'deserialize']);
        return new self(
            $quickReplies
        );
    }
}