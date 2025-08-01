<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Account;

use DigitalStars\MtprotoClient\Generated\Types\Account\AbstractThemes;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/account.getThemes
 */
final class GetThemesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 1913054296;
    
    public string $_ = 'account.getThemes';
    
    public function getMethodName(): string
    {
        return 'account.getThemes';
    }
    
    public function getResponseClass(): string
    {
        return AbstractThemes::class;
    }
    /**
     * @param string $format
     * @param int $hash
     */
    public function __construct(
        public readonly string $format,
        public readonly int $hash
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->format);
        $buffer .= $serializer->int64($this->hash);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}