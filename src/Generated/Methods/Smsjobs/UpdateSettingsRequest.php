<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Smsjobs;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/smsjobs.updateSettings
 */
final class UpdateSettingsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 155164863;
    
    public string $_ = 'smsjobs.updateSettings';
    
    public function getMethodName(): string
    {
        return 'smsjobs.updateSettings';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param bool|null $allowInternational
     */
    public function __construct(
        public readonly ?bool $allowInternational = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->allowInternational) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}