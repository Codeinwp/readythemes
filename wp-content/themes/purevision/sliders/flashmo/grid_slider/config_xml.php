<?php

$this_dir = get_bloginfo('template_url').'/sliders/flashmo/grid_slider/';
$the_home_url = get_bloginfo('url');
$gs_slides_array = explode( ',', $purevision_options['gs_slides_order_str'] );
$individual_photos = '';
$bar_status = ( $purevision_options['gs_bar_status'] == 'zero' ) ? '0' : $purevision_options['gs_bar_status'];

foreach( $gs_slides_array as $slide_row_number ) {
    $gs_slide_img_url = $purevision_options['gs_slide_img_url_'.$slide_row_number];
    $gs_slide_default_info_txt = $purevision_options['gs_slide_default_info_txt_'.$slide_row_number];
    $gs_slide_transition_flow = $purevision_options['gs_slide_transition_flow_'.$slide_row_number];
    $gs_slide_transition_direction = $purevision_options['gs_slide_transition_direction_'.$slide_row_number];
    $gs_slide_transition_rotation = ( $purevision_options['gs_slide_transition_rotation_'.$slide_row_number] == 'zero' ) ? '0': $purevision_options['gs_slide_transition_rotation_'.$slide_row_number];

    $individual_photos .= "<photo>";
    $individual_photos .=	"<filename>{$gs_slide_img_url}</filename>";
    $individual_photos .=	"<description><![CDATA[{$gs_slide_default_info_txt}]]></description>";
    $individual_photos .=	"<transition flow='{$gs_slide_transition_flow}' direction='{$gs_slide_transition_direction}' rotation='{$gs_slide_transition_rotation}'></transition>";
    $individual_photos .= "</photo>";
}

return <<<XML
<?xml version="1.0" encoding="utf-8"?>
<photos>
	<config
		auto_play="{$purevision_options['gs_auto_play']}"
		auto_play_duration="{$purevision_options['gs_auto_play_duration']}"
		grid_row="{$purevision_options['gs_grid_row']}"
		grid_column="{$purevision_options['gs_grid_column']}"
		tween_duration="{$purevision_options['gs_tween_duration']}"
		tween_delay="{$purevision_options['gs_tween_delay']}"
		stylesheet="{$this_dir}flashmo_224_style.css"
		bar_status="{$bar_status}">
	</config>
	{$individual_photos}
</photos>

XML;



