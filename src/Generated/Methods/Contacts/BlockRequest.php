<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Contacts;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputPeer;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/contacts.block
 */
final class BlockRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x2e2e8734;
    
    public string $_ = 'contacts.block';
    
    public function getMethodName(): string
    {
        return 'contacts.block';
    }
    
    public function getResponseClass(): string
    {
        return 'bool';
    }
    /**
     * @param AbstractInputPeer $id
     * @param bool|null $myStoriesFrom
     */
    public function __construct(
        public readonly AbstractInputPeer $id,
        public readonly ?bool $myStoriesFrom = null
    ) {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);
        $flags = 0;
        if ($this->myStoriesFrom) $flags |= (1 << 0);
        $buffer .= Serializer::int32($flags);

        $buffer .= $this->id->serialize();
        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}