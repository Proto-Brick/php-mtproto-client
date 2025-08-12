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
    public const CONSTRUCTOR_ID = 0x6a4ee832;
    
    public string $predicate = 'help.deepLinkInfo';
    
    /**
     * @param string $message
     * @param true|null $updateApp
     * @param list<AbstractMessageEntity>|null $entities
     */
    public function __construct(
        public readonly string $message,
        public readonly ?true $updateApp = null,
        public readonly ?array $entities = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->updateApp) $flags |= (1 << 0);
        if ($this->entities !== null) $flags |= (1 << 1);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes($this->message);
        if ($flags & (1 << 1)) {
            $buffer .= Serializer::vectorOfObjects($this->entities);
        }

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $updateApp = ($flags & (1 << 0)) ? true : null;
        $message = Deserializer::bytes($stream);
        $entities = ($flags & (1 << 1)) ? Deserializer::vectorOfObjects($stream, [AbstractMessageEntity::class, 'deserialize']) : null;

        return new self(
            $message,
            $updateApp,
            $entities
        );
    }
}