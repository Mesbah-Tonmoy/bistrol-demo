<?php
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'group_5bf3bc1b4e26c_test',
	'title' => 'Page Options',
	'fields' => array(


		array(
			'key' => 'field_5bf3c134a081e',
			'label' => 'Header',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		),

		array(
			'key' => 'field_5c387546a3e4c',
			'label' => 'Show Header',
			'name' => 'axil_show_header',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
        array(
            'key' => 'field_5c3875f7a3e4e',
            'label' => 'Select Header Template',
            'name' => 'axil_select_header_style',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                0 => 'Default',
                1 => 'Header Layout 1',
                2 => 'Header Layout 2',
                3 => 'Header Layout 3',
                4 => 'Header Layout 4',
                
            ),
            'default_value' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5c387546a3e4c',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),

         array(
            'key' => 'field_5f3c1ed52db7e_nav_menu',
            'label' => esc_html__('Select Menu', 'abstrak'),
            'name' => 'axil_select_nav_menu',
            'type' => 'select',
            'instructions' => esc_html__('By default works primary location menu.', 'abstrak'),
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => axil_get_nav_menus(),
            'default_value' => false,
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5c387546a3e4c',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),

		array(
			'key' => 'field_5c52c42f6fdfc',
			'label' => 'Header Sticky',
			'name' => 'axil_header_sticky',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5c387546a3e4c',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
		),
 array(
        'key' => 'field_5c52c42f6fdfci',
        'label' => 'Header shopping cart',
        'name' => 'axil_shopping_cart',
        'type' => 'radio',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'allow_null' => 1,
        'other_choice' => 0,
        'default_value' => '',
        'layout' => 'horizontal',
        'return_format' => 'value',
        'save_other_choice' => 0,
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'field_5c387546a3e4c',
                    'operator' => '==',
                    'value' => 'yes',
                ),
            ),
        ),
    ),
   array(
            'key' => 'field_5c52c42f6fdfoc',
            'label' => 'Header Offcanvas',
            'name' => 'axil_enable_offcanvas_button',
            'type' => 'radio',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No',
            ),
            'allow_null' => 1,
            'other_choice' => 0,
            'default_value' => '',
            'layout' => 'horizontal',
            'return_format' => 'value',
            'save_other_choice' => 0,
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5c387546a3e4c',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),
    array(
        'key' => 'field_5c52c42f6fdfbb',
        'label' => 'Header Button',
        'name' => 'axil_header_button',
        'type' => 'radio',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'allow_null' => 1,
        'other_choice' => 0,
        'default_value' => 'no',
        'layout' => 'horizontal',
        'return_format' => 'value',
        'save_other_choice' => 0,
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'field_5c387546a3e4c',
                    'operator' => '==',
                    'value' => 'yes',
                ),
            ),
        ),
    ),
   

    array(
        'key' => 'field_5bf3f6fc0509cbu',
        'label' => 'Button Url',
        'name' => 'axil_header_button_url',
        'type' => 'text',
        'instructions' => 'If this field is empty, then default Header button url will be showed',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'field_5c52c42f6fdfbb',
                    'operator' => '==',
                     'value' => 'yes',
                ),
            ),
           
        ),
    ),

      array(
        'key' => 'field_5bf3f6fc0509cbt',
        'label' => 'Button Text',
        'name' => 'axil_header_button_txt',
        'type' => 'text',
        'instructions' => 'If this field is empty, then default Header button Text will be showed',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'field_5c52c42f6fdfbb',
                    'operator' => '==',
                     'value' => 'yes',
                ),
            ),
           
        ),
    ),

      
		array(
			'key' => 'field_5bf3c14ba081f',
			'label' => 'Page Banner Area',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),

		array(
			'key' => 'field_5bf3f6b20509a',
			'label' => 'Page Banner Area',
			'name' => 'axil_title_wrapper_show',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),

         array(
            'key' => 'field_banner_layout',
            'label' => 'Select Banner Template',
            'name' => 'axil_select_banner_style',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                0 => 'Default',
                1 => 'Banner Layout 1',
                2 => 'Banner Layout 2',
                3 => 'Banner Layout 3',
                
                
            ),
            'default_value' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bf3f6b20509a',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),

        array(
            'key' => 'field_5bf655966ed4b',
            'label' => 'Breadcrumbs Enable',
            'name' => 'axil_breadcrumbs_enable',
            'type' => 'radio',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No',
            ),
            'allow_null' => 1,
            'other_choice' => 0,
            'save_other_choice' => 0,
            'default_value' => '',
            'layout' => 'horizontal',
            'return_format' => 'value',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bf3f6b20509a',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),
		array(
			'key' => 'field_5bf3f6fc0509c',
			'label' => 'Custom Title',
			'name' => 'axil_custom_title',
			'type' => 'text',
			'instructions' => 'If this field is empty, then default page/post title will be showed',
			'required' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bf3f6b20509a',
                        'operator' => '==',
                         'value' => 'yes',
                    ),
                ),
               
            ),
		),
        array(
            'key' => 'field_page_banner_sub_title_text',
            'label' => 'Custom Sub Title',
            'name' => 'axil_custom_sub_title',
            'type' => 'text',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bf3f6b20509a',
                        'operator' => '==',
                         'value' => 'yes',
                    ),
                ),
            ),
        ),
        
        array(
            'key' => 'field_5c3de8217d5ec',
            'label' => 'Select Banner Image',
            'name' => 'axil_select_banner_img',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
          
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
                      
            'allow_null' => 0,
            'multiple' => 0,
            'return_format' => 'id',
            'ui' => 1,
               'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bf3f6b20509a',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),

        array(
            'key' => 'field_5c3de8217d5e3c',
            'label' => 'Select Banner Shape',
            'name' => 'axil_select_banner_shape',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
          
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
                      
            'allow_null' => 0,
            'multiple' => 0,
            'return_format' => 'id',
            'ui' => 1,
               'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bf3f6b20509a',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),
         array(
            'key' => 'field_5c3de8217d5e3c2',
            'label' => 'Select Banner Shape 2',
            'name' => 'axil_select_banner_shape2',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
          
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
                      
            'allow_null' => 0,
            'multiple' => 0,
            'return_format' => 'id',
            'ui' => 1,
               'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bf3f6b20509a',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),

       
        // Footer Top
        array(
            'key' => 'field_footer_top',
            'label' => 'Footer Top',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        array(
            'key' => 'field_show_footer_top',
            'label' => 'Show Footer Top',
            'name' => 'axil_show_footer_top',
            'type' => 'radio',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No',
            ),
            'allow_null' => 1,
            'other_choice' => 0,
            'save_other_choice' => 0,
            'default_value' => '',
            'layout' => 'horizontal',
            'return_format' => 'value',
        ),
       
        array(
           'key' => 'field_footer_top_layout',
           'label' => 'Select Footer Top Template',
           'name' => 'axil_select_footer_top_style',
           'type' => 'select',
           'instructions' => '',
           'required' => 0,
           'wrapper' => array(
               'width' => '',
               'class' => '',
               'id' => '',
           ),
           'choices' => array(
               0 => 'Default',
               1 => 'Banner Layout 1',
               2 => 'Banner Layout 2',
               3 => 'Banner Layout 3',
              
               
               
           ),
           'default_value' => array(
           ),
           'allow_null' => 0,
           'multiple' => 0,
           'ui' => 0,
           'return_format' => 'value',
           'ajax' => 0,
           'placeholder' => '',
           'conditional_logic' => array(
               array(
                   array(
                       'field' => 'field_show_footer_top',
                       'operator' => '==',
                       'value' => 'yes',
                   ),
               ),
           ),
       ),
        // Footer
		array(
			'key' => 'field_5bf3c169a0820',
			'label' => 'Footer',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5bfe771692a07',
			'label' => 'Show Footer',
			'name' => 'axil_show_footer',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),

		array(
            'key' => 'field_5c3875f7a3e4eS',
            'label' => 'Select Footer Template',
            'name' => 'axil_select_footer_style',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                0 => 'Default',
                1 => 'Footer Layout 1',
                2 => 'Footer Layout 2',
                3 => 'Footer Layout 3',
              
                
            ),
            'default_value' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_5bfe771692a07',
                        'operator' => '==',
                        'value' => 'yes',
                    ),
                ),
            ),
        ),
        
        array(
            'key' => 'field_5bf3c134a081po',
            'label' => 'One Page Option',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'left',
            'endpoint' => 0,
        ),
        array(
            'key' => 'field_5bfe771692a07op',
            'label' => 'Active One Page',
            'name' => 'axil_active_onepage',
            'type' => 'radio',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'yes' => 'Yes',
                'no' => 'No',
            ),
            'allow_null' => 1,
            'other_choice' => 0,
            'save_other_choice' => 0,
            'default_value' => '',
            'layout' => 'horizontal',
            'return_format' => 'value',
        ),

	),

    'location' => array(
    	array(
    		array(
    			'param' => 'post_type',
    			'operator' => '==',
    			'value' => 'page',
    		),
    	),
    	array(
    		array(
    			'param' => 'post_type',
    			'operator' => '==',
    			'value' => 'post',
    		),
    	),
    	array(
    		array(
    			'param' => 'post_type',
    			'operator' => '==',
    			'value' => 'axil-projects',
    		),
    	),
    	array(
    		array(
    			'param' => 'post_type',
    			'operator' => '==',
    			'value' => 'axil_team',
    		),
    	),
    	array(
    		array(
    			'param' => 'post_type',
    			'operator' => '==',
    			'value' => 'axil_services',
    		),
    	),	
    	array(
    		array(
    			'param' => 'post_type',
    			'operator' => '==',
    			'value' => 'axil-case-study',
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

 if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_61dfe576a498b',
    'title' => 'One page popup details content',
    'fields' => array(
        array(
            'key' => 'field_61dfe5aa80b23',
            'label' => 'Content',
            'name' => 'popup_content',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'delay' => 1,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'axil-case-study',
            ),
        ),
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'axil-projects',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
));

endif;      