<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBotPreviewMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.getPreviewMedias
 */
final class GetPreviewMediasRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2728745293;
    
    public string $_ = 'bots.getPreviewMedias';
    
    public function getMethodName(): string
    {
        return 'bots.getPreviewMedias';
    }
    
    public function getResponseClass(): string
    {
        return AbstractBotPreviewMedia::class;
    }
    /**
     * @param AbstractInputUser $bot
     */
    public function __construct(
        public readonly AbstractInputUser $bot
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}