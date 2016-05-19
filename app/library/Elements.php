<?php
use Phalcon\Mvc\User\Component;

class Elements extends Component
{
    private $_headerMenu = array(
        /*Menu NORMAL -> el primer parametro es el controlador, y el valor es un array de: texto que va a verse
        y acción del controlador que se va a llamar.
        La acción tiene que estar presente.
        Si se pone vacía se toma la acción 'index'
        */
        'index' => array(
            'caption' => 'Home',
            'action' => ''
        ),
        'tutorial' => array(
            'caption' => 'Tutorial',
            'action' => ''
        ),
        'languages'=>array(
            'caption' => 'Languages',
            'action' => '',
            'dropdown' => true,
            'menu' => array(
                'Spanish' => 'languages/spanish',
                'English'=>'languages/english'
            )
        ),
        'management' => array(
            'caption' => 'Management',
            'action' => '',
            'dropdown' => true,
            'menu' => array(
                'Users' => 'users/index'
            )
        ),
        /* Menú DESPLEGABLE. Lleva la opción dropdown a true
        Debe llevar un action aunque esté vacío
        Lleva otra opción que es menú, que es la lista de opciones desplegables
        El formato es texto=>acción.
        En este caso se verá el menú Config, que su unica opción "Horas por profesor" llamará a
        configuration/index


        'configuration' => array(
            'caption' => "Config",
            'action' => '',
            'dropdown' => true,
            'menu' => array(
                'Horas por profesor' => 'index'
            )
        ),*/

        //Menú normal
        'session' => array(
            'caption' => 'Sign In',
            'action' => ''
        )
    );

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {

        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['UserPanel'] = array(
                'caption' => "User Panel",
                'action' => '',
                'dropdown' => true,
                'menu' => array(
                    'Your profile' => 'userpanel/index',
                    'Log Out' => 'session/end'
                )
            );
            unset($this->_headerMenu['session']);
        } else {
            unset($this->_headerMenu['management']);
            unset($this->_headerMenu['tutorial']);
        }
        $controllerName = $this->view->getControllerName();
        echo '<nav>';
        echo '<ul class="nav masthead-nav">';
        foreach ($this->_headerMenu as $controller => $option) {
            echo "<li class='";
            if (!isset($option['dropdown'])) {
                if ($controllerName == $controller) {
                    echo 'active';
                }
                echo "' >";
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            } else {
                echo "dropdown'>";
                echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"true\">";
                echo $option['caption'];
                echo "<span class=\"caret\"></span></a>";
                echo "<ul class=\"dropdown-menu\">";
                foreach ($option['menu'] as $text => $link) {
                    echo "<li>";
                    $pos = strpos($link, "/");
                    if ($pos === false){
                        echo $this->tag->linkTo($controller . '/' . $link, $text);
                    }
                    else {
                        echo $this->tag->linkTo($link, $text);
                    }
                    echo "</li>";
                }
                echo "</ul>";
            }


        }
        echo '</ul>';
        echo '</nav>';

    }

}