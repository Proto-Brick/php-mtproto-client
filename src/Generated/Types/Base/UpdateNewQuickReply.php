<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateNewQuickReply
 */
final class UpdateNewQuickReply extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 4114458391;
    
    public string $_ = 'updateNewQuickReply';
    
    /**
     * @param AbstractQuickReply $quickReply
     */
    public function __construct(
        public readonly AbstractQuickReply $quickReply
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->quickReply->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $quickReply = AbstractQuickReply::deserialize($deserializer, $stream);
            return new self(
            $quickReply
        );
    }
}