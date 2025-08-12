<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Methods\Smsjobs;

use DigitalStars\MtprotoClient\Generated\Types\Smsjobs\Status;
use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;
use DigitalStars\MtprotoClient\TL\TlObject;

/**
 * @see https://core.telegram.org/method/smsjobs.getStatus
 */
final class GetStatusRequest extends TlObject
{
    public const CONSTRUCTOR_ID = 0x10a698e8;
    
    public string $predicate = 'smsjobs.getStatus';
    
    public function getMethodName(): string
    {
        return 'smsjobs.getStatus';
    }
    
    public function getResponseClass(): string
    {
        return Status::class;
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