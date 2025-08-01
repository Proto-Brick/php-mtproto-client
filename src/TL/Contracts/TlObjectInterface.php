<?php
namespace DigitalStars\MtprotoClient\TL\Contracts;

interface TlObjectInterface
{
    public function getConstructorId(): int;
    public function getPredicate(): string;
}