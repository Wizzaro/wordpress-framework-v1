<?php
namespace Wizzaro\WPFramework\v1\Setting;

abstract class AbstractOptionFormTab {
    
    protected $_setting_page_instance;
    
    protected $_option_instance;
    
    protected $_tab_option = array(
        'name' => '',
        'slug' => ''
    );
    
    public function _construct( &$setting_page_instance, &$option_instance ) {
        
        $this->_setting_page_instance = $setting_page_instance;
        $this->_setting_page_instance->add_tab( $this->_tab_option['name'], $this->_tab_option['slug'], $this, 'render_option_tab' );
        
        $this->_option_instance = $option_instance;
        
        add_action( 'admin_init', array( $this, 'register_settings' ) );
    }
    
    protected function _get_settings_config() {
        return array();
    }
    
    public function get_option_instacne() {
        return $this->_option_instance;
    }
    
    public function render_option_tab() {
        $this->_setting_page_instance->render_settings_form( $this->_get_settings_config() );
    }
    
    public function register_settings() {
        $this->_setting_page_instance->register_settings( $this->_options, $this->_get_settings_config() );
    }
    
    public function validate_options( $input ) {
        return $input;
    }
}