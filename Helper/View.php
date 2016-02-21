<?php
namespace Wizzaro\WPFramework\v1\Helper;

use Wizzaro\WPFramework\v1\AbstractSingleton; 

class View extends AbstractSingleton {
    
    public function render( $view_path, $view_data = array() ) {
        include( $view_path );
    }
    
    public function get_content( $view_path, $view_data = array() ) {
        ob_start();
        require $view_path;
        $view = ob_get_clean();
        return $view;
    }
}