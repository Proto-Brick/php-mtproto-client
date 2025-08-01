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
    public const CONSTRUCTOR_ID = 873977640;
    
    public string $_ = 'inputPaymentCredentials';
    
    /**
     * @param array $data
     * @param bool|null $save
     */
    public function __construct(
        public readonly array $data,
        public readonly ?bool $save = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->save) $flags |= (1 << 0);
        $buffer .= $serializer->int32($flags);

        $buffer .= (new DataJSON(json_encode($this->data)))->serialize($serializer);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        $deserializer->int32($stream); // Constructor ID is consumed here.
        $flags = $deserializer->int32($stream);

        $save = ($flags & (1 << 0)) ? true : null;
        $data = json_decode((DataJSON::deserialize($deserializer, $stream))->data, true);
            return new self(
            $data,
            $save
        );
    }
}