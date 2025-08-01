<?php
namespace DigitalStars\MtprotoClient\TL\Contracts;

use DigitalStars\MtprotoClient\TL\Deserializer;
use DigitalStars\MtprotoClient\TL\Serializer;

interface Serializable
{
    public function serialize(Serializer $serializer): string;

    public static function deserialize(Deserializer $deserializer, string &$payload): static;
}