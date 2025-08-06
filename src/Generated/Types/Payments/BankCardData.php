<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\BankCardOpenUrl;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.bankCardData
 */
final class BankCardData extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3e24e573;
    
    public string $_ = 'payments.bankCardData';
    
    /**
     * @param string $title
     * @param list<BankCardOpenUrl> $openUrls
     */
    public function __construct(
        public readonly string $title,
        public readonly array $openUrls
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->bytes($this->title);
        $buffer .= $serializer->vectorOfObjects($this->openUrls);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $constructorId = $deserializer->int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new \Exception(sprintf('Invalid constructor ID for %s. Expected %s, got %s', __CLASS__, dechex(self::CONSTRUCTOR_ID), dechex($constructorId)));
        }

        $title = $deserializer->bytes($stream);
        $openUrls = $deserializer->vectorOfObjects($stream, [BankCardOpenUrl::class, 'deserialize']);
        return new self(
            $title,
            $openUrls
        );
    }
}