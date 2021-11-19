<?php

add_action( 'acf/init', 'saint_acf' );
function saint_acf(){
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_579ef9f2355bd',
	'title' => 'Saint du Jour',
	'fields' => array (
		array (
			'key' => 'field_579efa223b8a9',
			'label' => 'Date',
			'name' => 'saint_date',
			'type' => 'text',
			'instructions' => 'Inscrivez le jour dans le format "moismoisjourjour"',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'mmjj',
			'prepend' => '',
			'append' => '',
			'maxlength' => 4,
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_579efa543b8aa',
			'label' => 'Année de mort du Saint',
			'name' => 'saint_birthdate',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => 4,
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'saint',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
}
