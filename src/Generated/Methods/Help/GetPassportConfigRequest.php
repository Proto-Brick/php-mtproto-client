<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Help;

use DigitalStars\MtprotoClient\Generated\Types\Help\AbstractPassportConfig;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/help.getPassportConfig
 */
final class GetPassportConfigRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xc661ad08;
    
    public string $predicate = 'help.getPassportConfig';
    
    public function getMethodName(): string
    {
        return 'help.getPassportConfig';
    }
    
    public function getResponseClass(): string
    {
        return AbstractPassportConfig::class;
    }
    /**
     * @param int $hash
     */
    public function __construct(
        public readonly int $hash
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::int32($this->hash);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}