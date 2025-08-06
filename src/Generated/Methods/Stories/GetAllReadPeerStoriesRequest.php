<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Stories;

use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUpdates;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/stories.getAllReadPeerStories
 */
final class GetAllReadPeerStoriesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x9b5ae7f9;
    
    public string $_ = 'stories.getAllReadPeerStories';
    
    public function getMethodName(): string
    {
        return 'stories.getAllReadPeerStories';
    }
    
    public function getResponseClass(): string
    {
        return AbstractUpdates::class;
    }
    public function __construct() {}
    
    public function serialize(Serializer $serializer): string
    {
        $buffer = $serializer->int32(self::CONSTRUCTOR_ID);

        return $buffer;
    }

    public static function deserialize(Deserializer $deserializer, string &$stream): static
    {
        throw new \LogicException('Request objects are not deserializable');
    }
}