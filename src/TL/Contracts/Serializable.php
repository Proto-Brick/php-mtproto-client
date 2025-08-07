<?php

namespace DigitalStars\MtprotoClient\TL\Contracts;

interface Serializable
{
    public function serialize(): string;

    public static function deserialize(string &$stream): static;
}
