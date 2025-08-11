<?php

declare(strict_types=1);

namespace DigitalStars\MtprotoClient\Transport;

enum TransportProtocol: string
{
    case Abridged = 'abridged';
    case Intermediate = 'intermediate';
    case PaddedIntermediate = 'padded_intermediate';
}


