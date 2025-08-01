<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.activateStealthMode
 */
final class ActivateStealthModeRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1471926630;
    
    public string $_ = 'stories.activateStealthMode';
    
    public function getMethodName(): string
    {
        return 'stories.activateStealthMode';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param bool|null $past
     * @param bool|null $future
     */
    public function __construct(
        public readonly ?bool $past = null,
        public readonly ?bool $future = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->past) $flags |= (1 << 0);
        if ($this->future) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}