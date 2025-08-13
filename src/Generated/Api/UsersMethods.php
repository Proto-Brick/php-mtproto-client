<?php declare(strict_types=1);
namespace ProtoBrick\MTProtoClient\Generated\Api;

use ProtoBrick\MTProtoClient\Client;
use ProtoBrick\MTProtoClient\Generated\Methods\Users\GetFullUserRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Users\GetRequirementsToContactRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Users\GetUsersRequest;
use ProtoBrick\MTProtoClient\Generated\Methods\Users\SetSecureValueErrorsRequest;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractInputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractRequirementToContact;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractSecureValueError;
use ProtoBrick\MTProtoClient\Generated\Types\Base\AbstractUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUser;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserFromMessage;
use ProtoBrick\MTProtoClient\Generated\Types\Base\InputUserSelf;
use ProtoBrick\MTProtoClient\Generated\Types\Base\RequirementToContactEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Base\RequirementToContactPaidMessages;
use ProtoBrick\MTProtoClient\Generated\Types\Base\RequirementToContactPremium;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueError;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueErrorData;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueErrorFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueErrorFiles;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueErrorFrontSide;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueErrorReverseSide;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueErrorSelfie;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueErrorTranslationFile;
use ProtoBrick\MTProtoClient\Generated\Types\Base\SecureValueErrorTranslationFiles;
use ProtoBrick\MTProtoClient\Generated\Types\Base\User;
use ProtoBrick\MTProtoClient\Generated\Types\Base\UserEmpty;
use ProtoBrick\MTProtoClient\Generated\Types\Users\UserFull;


/**
 * DO NOT EDIT. This file is generated automatically.
 *
 * Contains methods for the "users" group.
 */
final readonly class UsersMethods
{
    public function __construct(private Client $client) {}

    /**
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $id
     * @return list<UserEmpty|User>
     * @see https://core.telegram.org/method/users.getUsers
     * @api
     */
    public function getUsers(array $id): array
    {
        return $this->client->callSync(new GetUsersRequest($id));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $id
     * @return UserFull|null
     * @see https://core.telegram.org/method/users.getFullUser
     * @api
     */
    public function getFullUser(AbstractInputUser $id): ?UserFull
    {
        return $this->client->callSync(new GetFullUserRequest($id));
    }

    /**
     * @param InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage $id
     * @param list<SecureValueErrorData|SecureValueErrorFrontSide|SecureValueErrorReverseSide|SecureValueErrorSelfie|SecureValueErrorFile|SecureValueErrorFiles|SecureValueError|SecureValueErrorTranslationFile|SecureValueErrorTranslationFiles> $errors
     * @return bool
     * @see https://core.telegram.org/method/users.setSecureValueErrors
     * @api
     */
    public function setSecureValueErrors(AbstractInputUser $id, array $errors): bool
    {
        return (bool) $this->client->callSync(new SetSecureValueErrorsRequest($id, $errors));
    }

    /**
     * @param list<InputUserEmpty|InputUserSelf|InputUser|InputUserFromMessage> $id
     * @return list<RequirementToContactEmpty|RequirementToContactPremium|RequirementToContactPaidMessages>
     * @see https://core.telegram.org/method/users.getRequirementsToContact
     * @api
     */
    public function getRequirementsToContact(array $id): array
    {
        return $this->client->callSync(new GetRequirementsToContactRequest($id));
    }
}