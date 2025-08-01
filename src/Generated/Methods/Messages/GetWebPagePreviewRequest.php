<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageMedia;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getWebPagePreview
 */
final class GetWebPagePreviewRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 2338894028;
    
    public string $_ = 'messages.getWebPagePreview';
    
    public function getMethodName(): string
    {
        return 'messages.getWebPagePreview';
    }
    
    public function getResponseClass(): string
    {
        return AbstractMessageMedia::class;
    }
    /**
     * @param string $message
     * @param list<AbstractMessageEntity>|null $entities
     */
    public function __construct(
        public readonly string $message,
        public readonly ?array $entities = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->entities !== null) $flags |= (1 << 3);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 3)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}