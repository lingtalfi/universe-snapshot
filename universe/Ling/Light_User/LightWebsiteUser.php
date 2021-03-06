<?php


namespace Ling\Light_User;


/**
 * The LightWebsiteUser class.
 *
 * This is the first website user, and a typical one.
 *
 * A website user has to login by providing credentials:
 * - an email
 * - a password
 *
 * A website user is defined by the following properties:
 *
 * - id: int=1. An int that identifies the user uniquely amongst other users (usually this number is auto-generated by your application).
 * - identifier: string. A string that identifies the user uniquely amongst other users.
 * - email: string|null. The email of the user, or null if it's not used.
 *          Note: some applications use the same value for the email and the identifier, as an email
 *          identifies a person uniquely.
 * - avatar_url: string|null. The url of the avatar image (or null if there is no avatar for this user)
 * - pseudo: string|null. The pseudo of the user.
 * - connect_time: timestamp (or false by default) of the moment when the user was first connected.
 *              This allows us to know exactly how long an user is connected at any time.
 * - last_refresh_time: timestamp of the moment when the user was last refreshed (or false by default).
 * - session_duration: int. The number of seconds to wait to turn a valid idle user into an invalid user
 *              The default is 300 (i.e. 5 minutes)
 * - rights: array. The rights (aka @page(permissions)) that this user has. See more about rights in the @page(user rights page).
 * - extra: array. This array contains any other properties that the application wants to attach to the user.
 *
 *
 *
 *
 *
 * A website user is a @concept(refreshable user).
 *
 *
 *
 */
class LightWebsiteUser implements RefreshableLightUserInterface
{


    /**
     * This property holds the id for this instance.
     * @var int=1
     */
    protected $id;

    /**
     * This property holds the identifier for this instance.
     * @var string
     */
    protected $identifier;

    /**
     * This property holds the email of the user.
     * @var string|null
     */
    protected $email;

    /**
     * This property holds the avatar_url of the user, or null if the user doesn't have an avatar.
     * @var string|null
     */
    protected $avatar_url;

    /**
     * This property holds the pseudo of the user (or null if the user doesn't have a pseudo).
     * @var string|null
     */
    protected $pseudo;

    /**
     * This property holds the timestamp when the user first connected (or false by default).
     * @var int|false
     */
    protected $connect_time;

    /**
     * This property holds the timestamp when the user was last refreshed.
     * See the @concept(refresh concept) for more details.
     *
     * @var int|false
     */
    protected $last_refresh_time;

    /**
     * This property holds the number of seconds to wait before turning an idle valid user into
     * an invalid user.
     *
     * @var int = 500
     */
    protected $session_duration;

    /**
     * This property holds the rights for this user.
     * See the @concept(rights concept) for more details.
     *
     * @var array
     */
    protected $rights;

    /**
     * This property holds the extra for this instance.
     * @var array
     */
    protected $extra;


    /**
     * Builds the LightWebsiteUser instance.
     */
    public function __construct()
    {
        $this->id = 1;
        $this->identifier = null;
        $this->email = null;
        $this->avatar_url = null;
        $this->pseudo = null;
        $this->connect_time = false;
        $this->last_refresh_time = false;
        $this->session_duration = 500;
        $this->rights = [];
        $this->extra = [];
    }


    /**
     * @implementation
     */
    public function isValid(): bool
    {
        if (false !== $this->last_refresh_time) {
            return (($this->last_refresh_time + $this->session_duration) > time());
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getIdentifier()
    {
        if (null !== $this->identifier) {
            return $this->identifier;
        }
        return false;
    }

    /**
     * @implementation
     */
    public function hasRight(string $right): bool
    {
        return in_array('*', $this->rights, true) || in_array($right, $this->rights, true);
    }

    /**
     * @implementation
     */
    public function refresh()
    {
        if (false !== $this->last_refresh_time) {
            $this->last_refresh_time = time();
        }
    }


    /**
     * Connects the user (i.e. stores it in the session).
     * Note: you should only use this method once just after the user credentials
     * have been checked.
     *
     *
     *
     *
     * @return void
     */
    public function connect()
    {
        $this->connect_time = time();
        $this->last_refresh_time = $this->connect_time;
    }


    /**
     * Disconnects the current user.
     * Note: if the user is already disconnected, the method does nothing.
     *
     *
     * @return void
     */
    public function disconnect()
    {
        $this->connect_time = false;
        $this->last_refresh_time = false;
    }

    /**
     * Updates the user information.
     * This method is just a shortcut method that saves you from calling the setter methods manually
     * in the case where you have an array of user information you want to update the user with.
     *
     *
     * Only the following info can be updated:
     * - email
     * - pseudo
     * - avatar_url
     * - rights
     * - extra
     *
     *
     * @param array $info
     */
    public function updateInfo(array $info)
    {

        if (array_key_exists("email", $info)) {
            $this->setEmail($info['email']);
        }
        if (array_key_exists("pseudo", $info)) {
            $this->setPseudo($info['pseudo']);
        }
        if (array_key_exists("avatar_url", $info)) {
            $this->setAvatarUrl($info['avatar_url']);
        }
        if (array_key_exists("rights", $info)) {
            $this->setRights($info['rights']);
        }
        if (array_key_exists("extra", $info)) {
            $this->setExtra($info['extra']);
        }
    }


    //--------------------------------------------
    // GETTERS / SETTERS
    //--------------------------------------------
    /**
     * Returns the id of this instance.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Sets the id.
     *
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }


    /**
     * Sets the identifier.
     *
     * @param string $identifier
     */
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Returns the email of this instance.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Sets the email.
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Returns the avatar_url of this instance.
     *
     * @return string|null
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    /**
     * Sets the avatar_url.
     *
     * @param string $avatar_url
     */
    public function setAvatarUrl(string $avatar_url)
    {
        $this->avatar_url = $avatar_url;
    }

    /**
     * Returns the pseudo of this instance.
     *
     * @return string|null
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * Sets the pseudo.
     *
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * Returns the connect_time of this instance.
     *
     * @return false|int
     */
    public function getConnectTime()
    {
        return $this->connect_time;
    }

    /**
     * Sets the connect_time.
     *
     * @param int $connect_time
     */
    public function setConnectTime(int $connect_time)
    {
        $this->connect_time = $connect_time;
    }

    /**
     * Returns the last_refresh_time of this instance.
     *
     * @return false|int
     */
    public function getLastRefreshTime()
    {
        return $this->last_refresh_time;
    }

    /**
     * Sets the last_refresh_time.
     *
     * @param int $last_refresh_time
     */
    public function setLastRefreshTime(int $last_refresh_time)
    {
        $this->last_refresh_time = $last_refresh_time;
    }

    /**
     * Returns the session_duration of this instance.
     *
     * @return int
     */
    public function getSessionDuration(): int
    {
        return $this->session_duration;
    }

    /**
     * Sets the session_duration.
     *
     * @param int $session_duration
     */
    public function setSessionDuration(int $session_duration)
    {
        $this->session_duration = $session_duration;
    }

    /**
     * Returns the rights of this instance.
     *
     * @return array
     */
    public function getRights(): array
    {
        return $this->rights;
    }

    /**
     * Sets the rights.
     *
     * @param array $rights
     */
    public function setRights(array $rights)
    {
        $this->rights = $rights;
    }

    /**
     * Returns the extra of this instance.
     *
     * @return array
     */
    public function getExtra(): array
    {
        return $this->extra;
    }

    /**
     * Sets the extra.
     *
     * @param array $extra
     */
    public function setExtra(array $extra)
    {
        $this->extra = $extra;
    }

}