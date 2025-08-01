<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractShippingOption;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.setBotShippingResults
 */
final class SetBotShippingResultsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 3858133754;
    
    public string $_ = 'messages.setBotShippingResults';
    
    public function getMethodName(): string
    {
        return 'messages.setBotShippingResults';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param int $queryId
     * @param string|null $error
     * @param list<AbstractShippingOption>|null $shippingOptions
     */
    public function __construct(
        public readonly int $queryId,
        public readonly ?string $error = null,
        public readonly ?array $shippingOptions = null
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->error !== null) $flags |= (1 << 0);
        if ($this->shippingOptions !== null) $flags |= (1 << 1);
        $buffer .= $serializer->int32($flags);

        $buffer .= $serializer->int64($this->queryId);
        if ($flags & (1 << 0)) {
            $buffer .= $serializer->bytes($this->error);
        }
        if ($flags & (1 << 1)) {
            $buffer .= $serializer->vectorOfObjects($this->shippingOptions);
        }
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}