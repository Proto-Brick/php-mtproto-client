<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Bots;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputMedia;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/bots.reorderPreviewMedias
 */
final class ReorderPreviewMediasRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3056071594;
    
    public string $_ = 'bots.reorderPreviewMedias';
    
    public function getMethodName(): string
    {
        return 'bots.reorderPreviewMedias';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputUser $bot
     * @param string $langCode
     * @param list<AbstractInputMedia> $order
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly string $langCode,
        public readonly array $order
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize($serializer);
        $buffer .= $serializer->bytes($this->langCode);
        $buffer .= $serializer->vectorOfObjects($this->order);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}