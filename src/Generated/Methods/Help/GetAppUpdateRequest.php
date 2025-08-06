<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractAppUpdate;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getAppUpdate
 */
final class GetAppUpdateRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x522d5a7d;
    
    public string $_ = 'help.getAppUpdate';
    
    public function getMethodName(): string
    {
        return 'help.getAppUpdate';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAppUpdate::class;
    }
    /**
     * @param string $source
     */
    public function __construct(
        public readonly string $source
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->source);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}