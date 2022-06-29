<?php
/**
 * Handle frontend scripts
 *
 * @package Assets/Classes
 * @version 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class bgmshortcode {

    private $align          = 'center';
    
    private $width          = '500';
    
    private $height         = '300';
    
    private $address        = 'Briskstar Technologies LLP';
    
    private $infowindow     = 'A';
    
    private $zoom           = '14';
   
    private $companycode    = '';
    
    private $maptype        = 'm';


    public function __construct() {
        add_shortcode('bgm_map',array($this, 'bgm_maps_shortcode'));
    }


    public function bgm_maps_shortcode($attr , $content){
        extract(
            shortcode_atts(
                array(
                    "align"         => (isset($attr['align']) && !empty($attr['align'])) ? $attr['align']: $this->align, 
                    "width"         => (isset($attr['width']) && !empty($attr['width'])) ? $attr['width']: $this->width, 
                    "height"        => (isset($attr['height']) && !empty($attr['height'])) ? $attr['height']: $this->height, 
                    "address"       => (isset($attr['address']) && !empty($attr['address'])) ? $attr['address']: $this->address, 
                    "info_window"   => (isset($attr['infowindow']) && !empty($attr['infowindow'])) ? $attr['infowindow']: $this->infowindow,
                    "zoom"          => (isset($attr['zoom']) && !empty($attr['zoom'])) ? $attr['zoom']: $this->zoom, 
                    "companycode"   => (isset($attr['companycode']) && !empty($attr['companycode'])) ? $attr['companycode']: $this->companycode,
                    "maptype"       => (isset($attr['maptype']) && !empty($attr['maptype'])) ? $attr['maptype']: $this->maptype, 
                ), 
                $attr
            )
        );

        $query_string = 'q=' . urlencode($address) . '&cid=' . urlencode($companycode) . '&t=' . urlencode($maptype) . '&center=' . urlencode($address);
        
        return '<div class="bg-map"><iframe align="'.$align.'" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?&'.htmlentities($query_string).'&output=embed&z='.$zoom.'&iwloc='.$info_window.'&visual_refresh=true"></iframe></div>';
    }
}
return new bgmshortcode();
?>