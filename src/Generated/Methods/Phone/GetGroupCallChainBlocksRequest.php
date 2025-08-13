<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Phone;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputGroupCall;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/phone.getGroupCallChainBlocks
 */
final class GetGroupCallChainBlocksRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xee9f88a6;
    
    public string $predicate = 'phone.getGroupCallChainBlocks';
    
    public function getMethodName(): string
    {
        return 'phone.getGroupCallChainBlocks';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    /**
     * @param AbstractInputGroupCall $call
     * @param int $subChainId
     * @param int $offset
     * @param int $limit
     */
    public function __construct(
        public readonly AbstractInputGroupCall $call,
        public readonly int $subChainId,
        public readonly int $offset,
        public readonly int $limit
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $buffer .= $this->call->serialize();
        $buffer .= Serializer::int32($this->subChainId);
        $buffer .= Serializer::int32($this->offset);
        $buffer .= Serializer::int32($this->limit);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}