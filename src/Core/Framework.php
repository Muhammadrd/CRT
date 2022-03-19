<?php

namespace Core;

use Config\AppPermissions;
use Config\RolePermissions;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\HttpKernel;

class Framework extends HttpKernel implements HttpKernelInterface
{
    private $matcher;
    private $controllerResolver;
    private $argumentResolver;

    public function __construct(UrlMatcher $matcher, ControllerResolver $controllerResolver, ArgumentResolver $argumentResolver)
    {
        $this->matcher = $matcher;
        $this->controllerResolver = $controllerResolver;
        $this->argumentResolver = $argumentResolver;
    }

    public function handle(
        Request $request,
        $type = HttpKernelInterface::MASTER_REQUEST,
        $catch = true
    ) {
        $this->matcher->getContext()->fromRequest($request);
        $pathInfo = $request->getPathInfo();

        // Start the session
        SessionData::start();

        $id_role = SessionData::get('id_role');
        $alias_role = SessionData::get('alias_role');
        $url_tujuan = $request->getPathInfo();
        $GLOBALS['url'] = $url_tujuan;
        $GLOBALS['alias_role'] = $alias_role;
        $app_permissions_obj = new AppPermissions();
        $app_permissions = $app_permissions_obj->getPermissions();

        $select_permissions = [];
        foreach ($app_permissions as $key => $value) {
            if ($value['url'] == $url_tujuan) {
                $select_permissions = $value;
            }
        }
        // dd($select_permissions);

        if ($id_role != null) {
            $role_permissions_obj = new RolePermissions();
            $role_permissions = $role_permissions_obj->getAllRolePermissions();
            $GLOBALS['user_permissions'] = $role_permissions_obj->getRolePermissions($id_role);

            $has_permissions = false;
            if (count($select_permissions) > 0) {
                if (($GLOBALS['user_permissions'] != '*' && in_array($select_permissions['alias_permission'], $GLOBALS['user_permissions']))) {
                    $has_permissions = true;
                } else if ($GLOBALS['user_permissions'] == '*') {
                    $has_permissions = true;
                }
            }
            if (count($select_permissions) == 0) {
                $selected_url = $url_tujuan;
            } else {
                if ($has_permissions) {
                    $selected_url = $url_tujuan;
                } else {
                    $selected_url = '/admin';
                }
            }
        } else {
            if (count($select_permissions) == 0) {
                $selected_url = $url_tujuan;
            } else {
                $selected_url = '/admin';
            }
        }

        try {
            // $request->attributes->add($this->matcher->match($pathInfo));
            $request->attributes->add($this->matcher->match($selected_url));

            $controller = $this->controllerResolver->getController($request);
            $arguments = $this->argumentResolver->getArguments($request, $controller);

            return call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $exception) {
            return new Response('Not Found', 404);
        } catch (\Exception $exception) {
            return new Response('' . $exception, 500);
        }
    }
}
