<?php

class PxlIconSearch_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_icon_search';
    protected $title = 'BR Search Popup';
    protected $icon = 'eicon-search';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"pxl_icon","label":"Icon","type":"icons","fa4compatibility":"icon"}]},{"name":"section_style","label":"Style","tab":"style","controls":[{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-search-popup-button i":"color: {{VALUE}};","{{WRAPPER}} .pxl-search-popup-button.pxl-divider":"border-color: {{VALUE}};"}},{"name":"darkmode_icon_color","label":"Icon Color (Dark Mode)","type":"color","selectors":{".dark-mode {{WRAPPER}} .pxl-search-popup-button i":"color: {{VALUE}};",".dark-mode {{WRAPPER}} .pxl-search-popup-button.pxl-divider":"border-color: {{VALUE}};"}},{"name":"icon_color_hover","label":"Icon Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-search-popup-button:hover i":"color: {{VALUE}};"}},{"name":"darkmode_icon_color_hover","label":"Icon Color Hover (Dark Mode)","type":"color","selectors":{".dark-mode {{WRAPPER}} .pxl-search-popup-button:hover i":"color: {{VALUE}};"}},{"name":"icon_font_size","label":"Icon Font Size","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-search-popup-button":"font-size: {{SIZE}}{{UNIT}};"}},{"name":"show_divider","label":"Show Divider","type":"switcher","default":"false"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}