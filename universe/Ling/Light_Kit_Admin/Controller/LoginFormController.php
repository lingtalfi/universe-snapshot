<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_UserDatabase\LightUserDatabaseInterface;

/**
 * The LoginFormController class.
 */
class LoginFormController extends LightKitAdminController
{


    /**
     * Renders the login form, and handles it.
     * If an user connects successfully, she will be redirected to the page defined in the service configuration
     * by the login.on_success_route option.
     *
     *
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {

        $updator = null;

        if (
            array_key_exists("zeroadmin_login_form", $_POST) &&
            array_key_exists("username", $_POST) &&
            array_key_exists("password", $_POST)
        ) {
            $userName = $_POST['username'];
            $password = $_POST['password'];

            /**
             * @var $userDb LightUserDatabaseInterface
             */
            $userDb = $this->getContainer()->get('user_database');
            $userInfo = $userDb->getUserInfo($userName, $password);
            if (false !== $userInfo) {
                //--------------------------------------------
                // ON FORM VALID
                //--------------------------------------------

                //--------------------------------------------
                // CONNECTING THE USER
                //--------------------------------------------
                $user = $this->getUser();
                $user->setEmail($userName);
                $user->setRights($userInfo['rights']);
                $user->setPseudo($userInfo['pseudo']);
                $user->setAvatarUrl($userInfo['avatar_url']);
                $user->connect();


                //--------------------------------------------
                // REDIRECTING THE CONNECTED USER
                //--------------------------------------------
                $redirectRoute = $this->getKitAdmin()->getOption("login.on_success_route");
                return $this->redirectByRoute($redirectRoute);

            } else {
                //--------------------------------------------
                // ON FORM NOT VALID
                //--------------------------------------------
                // update the widget's template
                $updator = PageConfUpdator::create();
                $updates = [
                    "zones" => [
                        "body" => [
                            0 => [
                                "vars" => [
                                    "field_username" => [
                                        "value" => $_POST['username'],
                                    ],
                                    "field_password" => [
                                        "value" => $_POST['password'],
                                    ],
                                    "error_no_match_show" => true,
                                ],
                            ],
                        ],
                    ],
                ];
                $updator->setMergeArray($updates);
            }
        }
        return $this->renderPage('Light_Kit_Admin/zeroadmin/zeroadmin_login', [], $updator);
    }
}