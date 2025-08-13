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
    public const CONSTRUCTOR_ID = 0x8317c0c3;
    
    public string $predicate = 'updateBotWebhookJSON';
    
    /**
     * @param array $data
     */
    public function __construct(
        public readonly array $data
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::serializeDataJSON($this->data);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $data = Deserializer::deserializeDataJSON($stream);

        return new self(
            $data
        );
    }
}