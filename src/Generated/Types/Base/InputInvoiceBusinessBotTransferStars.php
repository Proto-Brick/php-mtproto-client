<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputInvoiceBusinessBotTransferStars
 */
final class InputInvoiceBusinessBotTransferStars extends AbstractInputInvoice
{
    public const CONSTRUCTOR_ID = 0xf4997e42;
    
    public string $predicate = 'inputInvoiceBusinessBotTransferStars';
    
    /**
     * @param AbstractInputUser $bot
     * @param int $stars
     */
    public function __construct(
        public readonly AbstractInputUser $bot,
        public readonly int $stars
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->bot->serialize();
        $buffer .= Serializer::int64($this->stars);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $bot = AbstractInputUser::deserialize($stream);
        $stars = Deserializer::int64($stream);

        return new self(
            $bot,
            $stars
        );
    }
}