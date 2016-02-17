<?php
namespace Wizzaro\WPFramework\v1\Bootstrap;

use Wizzaro\WPFramework\v1\AbstractBootstrap;

abstract class AbstractPluginBootstrap extends AbstractBootstrap {
    
    public function get_main_file_path() {
        return $this->_config['path']['main_file'];
    }
    
    public function get_dir_path() {
        if ( ! isset( $this->_config['path']['dir'] ) ) {
            $this->_config['path']['dir'] = plugin_dir_path( $this->_config['path']['main_file'] );
        }
        
        return $this->_config['path']['dir'];
    }
    
    public function get_dir_url() {
        if ( ! isset( $this->_config['path']['url'] ) ) {
            $this->_config['path']['url'] = plugin_dir_url( $this->_config['path']['main_file'] );
        }
        
        return $this->_config['path']['url'];
    }
}