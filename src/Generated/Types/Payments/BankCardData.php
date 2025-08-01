<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Payments;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractBankCardOpenUrl;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/payments.bankCardData
 */
final class BankCardData extends AbstractBankCardData
{
    public const CONSTRUCTOR_ID = 1042605427;
    
    public string $_ = 'payments.bankCardData';
    
    /**
     * @param string $title
     * @param list<AbstractBankCardOpenUrl> $openUrls
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
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $title = $deserializer->bytes($stream);
        $openUrls = $deserializer->vectorOfObjects($stream, [AbstractBankCardOpenUrl::class, 'deserialize']);
            return new self(
            $title,
            $openUrls
        );
    }
}