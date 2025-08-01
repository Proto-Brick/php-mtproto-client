<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Help;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractMessageEntity;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/help.deepLinkInfo
 */
final class DeepLinkInfo extends AbstractDeepLinkInfo
{
    public const CONSTRUCTOR_ID = 1783556146;
    
    public string $_ = 'help.deepLinkInfo';
    
    /**
     * @param string $message
     * @param bool|null $updateApp
     * @param list<AbstractMessageEntity>|null $entities
     */
    public function __construct(
        public readonly string $message,
        public readonly ?bool $updateApp = null,
        public readonly ?array $entities = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->updateApp) $flags |= (1 << 0);
        if ($this->entities !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->bytes($this->message);
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->entities);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $updateApp = ($flags & (1 << 0)) ? true : null;
        $message = $deserializer->bytes($stream);
        $entities = ($flags & (1 << 1)) ? $deserializer->vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;
            return new self(
            $message,
            $updateApp,
            $entities
        );
    }
}