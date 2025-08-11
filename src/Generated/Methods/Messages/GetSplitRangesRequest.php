<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Messages;

use DigitalStars\MtprotoClient\Generated\Types\Base\MessageRange;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/messages.getSplitRanges
 */
final class GetSplitRangesRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x1cff7e08;
    
    public string $_ = 'messages.getSplitRanges';
    
    public function getMethodName(): string
    {
        return 'messages.getSplitRanges';
    }
    
    public function getResponseClass(): string
    {
        return 'vector<' . MessageRange::class . '>';
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