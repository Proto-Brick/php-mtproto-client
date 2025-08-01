<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/updateBotWebhookJSON
 */
final class UpdateBotWebhookJSON extends AbstractUpdate
{
    public const CONSTRUCTOR_ID = 2199371971;
    
    public string $_ = 'updateBotWebhookJSON';
    
    /**
     * @param array $data
     */
    public function __construct(
        public readonly array $data
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= (new DataJSON(json_encode($this->data)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $data = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
            return new self(
            $data
        );
    }
}