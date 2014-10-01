<?php

$root = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}


$c1_slides_array = explode( ',', $purevision_options['c1_slides_order_str'] );
$transition_types_array = array();
foreach( $c1_slides_array as $slide_row_number ) {
    $transition_types_array[] = $purevision_options['c1_transition_type_'.$slide_row_number];
}
$transition_types_csv = implode(',', $transition_types_array);

$result = array(
	fx		=> $transition_types_csv,
	speed		=> $purevision_options['c1_speed'],
	timeout		=> $purevision_options['c1_timeout'],
	sync		=> ( $purevision_options['c1_sync'] ) ? 1 : 0
);

// create a new XML document
$doc = new DomDocument('1.0');

// create root node
$root = $doc->createElement( 'settings' );
$root = $doc->appendChild( $root );

foreach( $result as $param_name=>$param_value ){

    $child = $doc->createElement( $param_name );
    $child->appendChild(
	$doc->createTextNode( $param_value )
    );
    $root->appendChild( $child );
    $doc->appendChild( $root );

}

// get complete xml document
$xml_string = $doc->saveXML();

header('Content-Type: application/xml; charset=ISO-8859-1');

echo $xml_string;


