<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Channels;

use DigitalStars\MtprotoClient\Generated\Types\Messages\AbstractChats;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/channels.getGroupsForDiscussion
 */
final class GetGroupsForDiscussionRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0xf5dad378;
    
    public string $_ = 'channels.getGroupsForDiscussion';
    
    public function getMethodName(): string
    {
        return 'channels.getGroupsForDiscussion';
    }
    
    public function getResponseClass(): string
    {
        return AbstractChats::class;
    }
    public function __construct() {}
    
    public function serialize(): string
    {
        $buffer = Serializer::int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}