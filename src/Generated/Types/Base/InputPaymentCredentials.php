<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Types\Base;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/type/inputPaymentCredentials
 */
final class InputPaymentCredentials extends AbstractInputPaymentCredentials
{
    public const CONSTRUCTOR_ID = 0x3417d728;
    
    public string $predicate = 'inputPaymentCredentials';
    
    /**
     * @param array $data
     * @param true|null $save
     */
    public function __construct(
        public readonly array $data,
        public readonly ?true $save = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->save) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);
        $buffer .= Serializer::bytes(json_encode($this->data, JSON_FORCE_OBJECT));

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        Deserializer::int32($stream); // Constructor ID
        $flags = Deserializer::int32($stream);
        $save = ($flags & (1 << 0)) ? true : null;
        $data = Deserializer::deserializeDataJSON($stream);

        return new self(
            $data,
            $save
        );
    }
}