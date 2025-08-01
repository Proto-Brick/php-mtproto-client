<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractAffectedMessages;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.readMessageContents
 */
final class ReadMessageContentsRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 916930423;
    
    public string $_ = 'messages.readMessageContents';
    
    public function getMethodName(): string
    {
        return 'messages.readMessageContents';
    }
    
    public function getResponseClass(): string
    {
        return AbstractAffectedMessages::class;
    }
    /**
     * @param list<int> $id
     */
    public function __construct(
        public readonly array $id
    ) {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);
        $buffer .= $serializer->vectorOfInts($this->id);
        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}