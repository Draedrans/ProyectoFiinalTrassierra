<?php

/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 24/01/16
 * Time: 12:28
 */

use Phalcon\Acl;
use Phalcon\Acl\Adapter\Memory as AclList;
use Phalcon\Acl\Resource;
use Phalcon\Acl\Role;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\User\Plugin;

class SecurityPlugin extends Plugin
{
    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @return bool
     */
    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();

        $auth = $this->session->get('auth');
        if (!$auth) {
            $role = 'Guests';
        } else {
            if ($auth['is_admin'])
                $role = 'Admins';
            else
                $role = 'Users';
        }

        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {
            $dispatcher->forward(array(
                'controller' => 'errors',
                'action' => 'show401'
            ));
//            $this->session->destroy();
            return false;
        }
        return true;
    }

    /**
     * Returns an existing or new access control list
     *
     * @return AclList
     */
    public function getAcl()
    {
        /*
         * IMPORTANTE: EL NIVEL DE ACCESO ES ESCALAR.
         * CADA ROL TIENE ACCESO A TODOS SUS RECURSOS Y A LOS DE ROLES INFERIORES.
         * OJO CUIDAO CON CAMBIARLO, OJO CUIDAO.
         * */

        if (!isset($this->persistent->acl)) {

            $acl = new AclList();

            $acl->setDefaultAction(Acl::DENY);

            //Register roles
            $roles = array(
                'Admins' => new Role('Admins'),
                'Users' => new Role('Users'),
                'Guests' => new Role('Guests')
            );
            foreach ($roles as $role) {
                $acl->addRole($role);
            }
            //Recursos accesibles sólo a Jefes de Estudio
            $adminResources = array(
                'users' => array('new', 'update', 'save', 'delete'),
                'alumnos' => array('new', 'update', 'edit', 'create', 'save', 'delete'),
                'auto'=> array('index', 'delete', 'add', 'saveFile')
            );
            foreach ($adminResources as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }
            //Recursos accesibles por Jefes de Dpto y Jefes de Estudio.
            $userResources = array(
                'configuration' => array('index'),
                'tutorial' => array('index'),
                'users' => array('index', 'search'),
                'comentarios' => array('edit', 'save', 'new', 'create'),
                'observacionesalum' => array('edit', 'save','new','create'),
                'alumnos' => array('index', 'edit', 'create', 'search', 'verPerfil', 'verObservaciones', 'verIncidencias'),
                'userpanel' => array('index', 'changepassword', 'link', 'savepass')
            );
            foreach ($userResources as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }
            //Recursos accesibles por invitados (de momento pagina Home, Session para tener acceso a login, y Errors
            $publicResources = array(
                'index' => array('index', 'easteregg'),
                'session' => array('start', 'end', 'index'),
                'errors' => array('show401', 'show404', 'show500'),
                'languages' => array('spanish', 'english')
            );
            foreach ($publicResources as $resource => $actions) {
                $acl->addResource(new Resource($resource), $actions);
            }

            //Se le da acceso a todos los roles a los recursos de invitado.
            foreach ($roles as $role) {
                foreach ($publicResources as $resource => $actions) {
                    foreach ($actions as $action) {
                        $acl->allow($role->getName(), $resource, $action);
                    }
                }
            }
            //Se le da acceso a los recursos de admin solo a jefes de departamento.
            foreach ($adminResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow('Admins', $resource, $action);
                }
            }
            //Se le da acceso a los recursos de usuario tanto a administradores como a jefes de departamento normales.
            foreach ($userResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow('Admins', $resource, $action);
                    $acl->allow('Users', $resource, $action);
                }
            }
            //La ACL se guarda en sesión, si se cambia, para que surja efecto hay que reiniciar el navegador.
            $this->persistent->acl = $acl;
        }

        return $this->persistent->acl;
    }
}
