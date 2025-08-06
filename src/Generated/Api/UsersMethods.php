<?php declare(strict_types=1);
namespace DigitalStars\MtprotoClient\Generated\Api;

use DigitalStars\MtprotoClient\Client;
use DigitalStars\MtprotoClient\Generated\Methods\Users\GetFullUserRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Users\GetIsPremiumRequiredToContactRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Users\GetUsersRequest;
use DigitalStars\MtprotoClient\Generated\Methods\Users\SetSecureValueErrorsRequest;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractInputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractSecureValueError;
use DigitalStars\MtprotoClient\Generated\Types\Base\AbstractUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUser;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserFromMessage;
use DigitalStars\MtprotoClient\Generated\Types\Base\InputUserSelf;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueError;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueErrorData;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueErrorFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueErrorFiles;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueErrorFrontSide;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueErrorReverseSide;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueErrorSelfie;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueErrorTranslationFile;
use DigitalStars\MtprotoClient\Generated\Types\Base\SecureValueErrorTranslationFiles;
use DigitalStars\MtprotoClient\Generated\Types\Base\User;
use DigitalStars\MtprotoClient\Generated\Types\Base\UserEmpty;
use DigitalStars\MtprotoClient\Generated\Types\Users\UserFull;


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
     * @return list<bool>
     * @see https://core.telegram.org/method/users.getIsPremiumRequiredToContact
     * @api
     */
    public function getIsPremiumRequiredToContact(array $id): array
    {
        return $this->client->callSync(new GetIsPremiumRequiredToContactRequest($id));
    }
}