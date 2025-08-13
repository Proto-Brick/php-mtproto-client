<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Types\Payments;

use ProtoBrick\MTProtoClient\Generated\Types\Base\BankCardOpenUrl;
use ProtoBrick\MTProtoClient\TL\Deserializer;
use ProtoBrick\MTProtoClient\TL\Serializer;
use ProtoBrick\MTProtoClient\TL\TlObject;
use RuntimeException;

/**
 * @see https://core.telegram.org/type/payments.bankCardData
 */
final class BankCardData extends TlObject
{
    public const CONSTRUCTOR_ID = 0x3e24e573;
    
    public string $predicate = 'payments.bankCardData';
    
    /**
     * @param string $title
     * @param list<BankCardOpenUrl> $openUrls
     */
    public function __construct(
        public readonly string $title,
        public readonly array $openUrls
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= Serializer::bytes($this->title);
        $buffer .= Serializer::vectorOfObjects($this->openUrls);
        return $buffer;
    }
    public static function deserialize(string &$stream): static
    {
        $constructorId = Deserializer::int32($stream);
        if ($constructorId !== self::CONSTRUCTOR_ID) {
            throw new RuntimeException('Invalid constructor ID for ' . self::class);
        }
        $title = Deserializer::bytes($stream);
        $openUrls = Deserializer::vectorOfObjects($stream, [BankCardOpenUrl::class, 'deserialize']);

        return new self(
            $title,
            $openUrls
        );
    }
}