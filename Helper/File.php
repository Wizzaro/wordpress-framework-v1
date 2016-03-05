<?php
namespace TwoXprBlogCore\Helper;

use TwoXprBlogCore\AbstractSingleton; 

class File extends AbstractSingleton {
    
    public function rrmdir( $dir ) {
        if ( is_dir( $dir ) ) {
            $files = array_diff( scandir( $dir ), array( '.', '..' ) ); 
            
            foreach ($files as $file) { 
                ( is_dir( "$dir/$file" ) ) ? $this->rmdir( "$dir/$file" ) : unlink( "$dir/$file" ); 
            } 
            
            rmdir( $dir ); 
        }
    }
}
