<?php

declare(strict_types=1);

namespace ProtoBrick\MTProtoClient\Transport;

enum TransportProtocol: string
{
    case Abridged = 'abridged';
    case Intermediate = 'intermediate';
    case PaddedIntermediate = 'padded_intermediate';
}


