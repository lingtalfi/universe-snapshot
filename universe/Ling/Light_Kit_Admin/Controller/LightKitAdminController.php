<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\ReverseRouter\LightReverseRouterInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Service\LightKitAdminService;
use Ling\Light_User\WebsiteLightUser;


/**
 * The LightKitAdminController class.
 */
class LightKitAdminController extends LightController
{

    /**
     * Returns the kit admin service instance.
     *
     * @return LightKitAdminService
     * @throws \Exception
     */
    protected function getKitAdmin(): LightKitAdminService
    {
        return $this->getContainer()->get('kit_admin');
    }


    /**
     * Returns the current user.
     * Note: in light kit admin, we use the WebsiteLightUser
     *
     * @return WebsiteLightUser
     * @throws \Exception
     */
    protected function getUser(): WebsiteLightUser
    {
        return $this->getContainer()->get("user_manager")->getUser();
    }

    /**
     * Renders the given page using the @page(kit service).
     *
     * @param string $page
     * @param array $dynamicVariables
     * @param PageConfUpdator $updator
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     *
     */
    public function renderPage(string $page, array $dynamicVariables = [], PageConfUpdator $updator = null)
    {
        return $this->getContainer()->get("kit")->renderPage($page, $dynamicVariables, $updator);
    }


    //--------------------------------------------
    // SUGAR
    //--------------------------------------------
    /**
     * Returns a http response that redirects to the given route.
     *
     * @param string $redirectRoute
     * @return HttpResponseInterface
     * @throws \Ling\Light\Exception\LightException
     * @throws \Ling\Octopus\Exception\OctopusServiceErrorException
     */
    protected function redirectByRoute(string $redirectRoute): HttpResponseInterface
    {
        /**
         * @var $revRouter LightReverseRouterInterface
         */
        $revRouter = $this->getContainer()->get('reverse_router');
        $url = $revRouter->getUrl($redirectRoute, [], true);

        return HttpRedirectResponse::create($url);
    }
}