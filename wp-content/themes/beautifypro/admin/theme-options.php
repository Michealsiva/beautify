<?php  
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 2/5/16
 * Time: 4:32 PM        
 */    
           
include_once( get_template_directory() . '/admin/kirki/kirki.php' );   
include_once( get_template_directory() . '/admin/kirki-helpers/class-theme-kirki.php' ); 
     

Beautify_Kirki::add_config( 'beautify_pro', array(     
    'capability'    => 'edit_theme_options',                  
    'option_type'   => 'theme_mod',          
) );               
     
// Flat option start //   

//  site identity section // 

Beautify_Kirki::add_section( 'title_tagline', array(
    'title'          => __( 'Site Identity','beautify_pro' ),
    'description'    => __( 'Site Header Options', 'beautify_pro'),       
    'priority'       => 8,                                                                                                                
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'logo_title',
    'label'    => __( 'Enable Logo as Title', 'beautify_pro' ),
    'section'  => 'title_tagline',
    'type'     => 'switch',
    'priority' => 5,
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => 'off',   
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'tagline',
    'label'    => __( 'Show site Tagline', 'beautify_pro' ), 
    'section'  => 'title_tagline',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => 'on',
) );  

// home panel //

Beautify_Kirki::add_panel( 'home_options', array(     
    'title'       => __( 'Home', 'beautify_pro' ),
    'description' => __( 'Home Page Related Options', 'beautify_pro' ),     
) );  


// home page type section

 Beautify_Kirki::add_section( 'home-beautify', array(
    'title'          => __( 'PRO Home - General Settings','beautify_pro' ),
    'description'    => __( 'Home Page options', 'beautify_pro'),
    'panel'          => 'home_options', // Not typically needed. 
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'enable_home_default_content',
    'label'    => __( 'Enable Home Page Default Content', 'beautify_pro' ),
    'section'  => 'home-beautify',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'off',
    'tooltip' => __('Use pagebuilder to built pro home page (or) Use prebuilt layout','beautify_pro'),
) );  


// Slider section   

Beautify_Kirki::add_section( 'slider-section', array(
    'title'          => __( 'Slider Section','beautify_pro' ),
    'description'    => __( 'Home Page Slider Related Options', 'beautify_pro'),
    'panel'          => 'home_options', // Not typically needed. 
) );
Beautify_Kirki::add_field( 'beautify_pro', array(  
    'settings' => 'slider_field',  
    'label'    => __( 'Enable Slider Post ( Section )', 'beautify_pro' ),
    'section'  => 'slider-section',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ),
    ),
    'default'  => 'on',
    'tooltip' => __('Enable Slider Post in home page','beautify_pro'),
) );
 
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'slider_cat',
    'label'    => __( 'Slider Posts category', 'beautify_pro' ),
    'section'  => 'slider-section',
    'type'     => 'select',
    'choices' => Kirki_Helper::get_terms( 'category' ),
    'active_callback' => array(
        array(
            'setting'  => 'slider_field', 
            'operator' => '==',
            'value'    => true, 
        ),
    ),
    'tooltip' => __('Create post ( Goto Dashboard => Post => Add New ) and Post Featured Image ( Preferred size is 1200 x 450 pixels ) as taken as slider image and Post Content as taken as Flexcaption.','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'slider_count',
    'label'    => __( 'No. of Sliders', 'beautify_pro' ),
    'section'  => 'slider-section',
    'type'     => 'number',
    'choices' => array(
        'min' => 1,
        'max' => 999,
        'step' => 1,
    ),
    'default'  => 2,
    'active_callback' => array(
        array(
            'setting'  => 'slider_field',
            'operator' => '==',
            'value'    => true,
        ),                                                                             
    ),
    'tooltip' => __('Enter number of slides you want to display under your selected Category','beautify_pro'),
) );

// service section 

Beautify_Kirki::add_section( 'service_section', array(
    'title'          => __( 'Service Section','beautify_pro' ),
    'description'    => __( 'Home Page - Service Related Options', 'beautify_pro'),
    'panel'          => 'home_options', // Not typically needed. 
) );

Beautify_Kirki::add_field( 'beautify_pro', array(  
    'settings' => 'service_section_status',  
    'label'    => __( 'Enable Service Section', 'beautify_pro' ),
    'section'  => 'service_section',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ),
    ),
    'default'  => 'on',
    'tooltip' => __('Enable Service section in home page','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'service_section_title',
    'label'    => __( 'Service Section Title & Description', 'beautify_pro' ),
    'section'  => 'service_section',
    'type'     => 'dropdown-pages', 
    'active_callback' => array(
        array(
            'setting'  => 'service_section_status',
            'operator' => '==',
            'value'    => true,
        ),                                                                       
    ),
) );

for ( $i = 1 ; $i <= 3 ; $i++ ) {
    //Create the settings Once, and Loop through it.
    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'service_section_icon_'.$i,
        'label'    => sprintf(__( 'Service Section Icons #%1$s', 'beautify_pro' ), $i ),
        'section'  => 'service_section',
        'type'     => 'text',
        'description' => sprintf(__( '%1$s (fa fa-apple) ', 'beautify_pro' ), '<a href="http://fontawesome.io/icons/">Type FontAwesome icons</a>' ),          
        'active_callback' => array(
            array(
                'setting'  => 'service_section_status',
                'operator' => '==',
                'value'    => true,
            ),                                                                       
        ),
    ) );

    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'service_section_'.$i,
        'label'    => sprintf(__( 'Service Section #%1$s', 'beautify_pro' ), $i ),
        'section'  => 'service_section',
        'type'     => 'dropdown-pages', 
        'active_callback' => array(
            array(
                'setting'  => 'service_section_status',
                'operator' => '==',
                'value'    => true,
            ),          
        ),    
    ) );
    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'service_color_'.$i,
        'label'    => sprintf(__( 'Choose Service Section Icons #%1$s', 'beautify_pro' ), $i ),
        'section'  => 'service_section',
        'type'     => 'color', 
        'active_callback' => array(
            array(
                'setting'  => 'service_section_status',
                'operator' => '==',
                'value'    => true,
            ),                                                                        
        ),        
    ) );
}
 
// Image section 

Beautify_Kirki::add_section( 'image-content-section', array(
    'title'          => __( 'Image Content Section','beautify_pro' ),
    'description'    => __( 'Home Page - Related Options', 'beautify_pro'),
    'panel'          => 'home_options', // Not typically needed. 
) );

Beautify_Kirki::add_field( 'beautify_pro', array(  
    'settings' => 'image_content_section_status',  
    'label'    => __( 'Enable Image content Section', 'beautify_pro' ),
    'section'  => 'image-content-section',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ),
    ),
    'default'  => 'on',
    'tooltip' => __('Enable Image content section in home page','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'image_content_section_title',
    'label'    => __( 'Image Section Title & Description', 'beautify_pro' ),
    'section'  => 'image-content-section',
    'type'     => 'dropdown-pages', 
    'active_callback' => array(
        array(
            'setting'  => 'image_content_section_status',
            'operator' => '==',
            'value'    => true,
        ),          
    ),    
) );

for ( $i = 1 ; $i <= 2 ; $i++ ) {
    //Create the settings Once, and Loop through it.
    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'image_content_section_'.$i,
        'label'    => sprintf(__( 'Image Contenr Section #%1$s', 'beautify_pro' ), $i ),
        'section'  => 'image-content-section',
        'type'     => 'dropdown-pages', 
        'active_callback' => array(
            array(
                'setting'  => 'image_content_section_status',
                'operator' => '==',
                'value'    => true,
            ),          
        ),    
    ) );
}


// latest blog section 

Beautify_Kirki::add_section( 'latest_blog_section', array(
    'title'          => __( 'Latest Blog Section','beautify_pro' ),
    'description'    => __( 'Home Page - Latest Blog Options', 'beautify_pro'),
    'panel'          => 'home_options', // Not typically needed. 
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'enable_recent_post_service',
    'label'    => __( 'Enable Recent Post Section', 'beautify_pro' ),
    'section'  => 'latest_blog_section',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),

    'default'  => 'on',
    'tooltip' => __('Enable recent post section in home page','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'recent_post_section_title',
    'label'    => __( 'Recent Post Section Title & Description', 'beautify_pro' ),
    'section'  => 'latest_blog_section',
    'type'     => 'dropdown-pages', 
    'active_callback' => array(
        array(
            'setting'  => 'enable_recent_post_service',
            'operator' => '==',
            'value'    => true,
        ),

    ),
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'recent_posts_count',
    'label'    => __( 'No. of Recent Posts', 'beautify_pro' ),
    'section'  => 'latest_blog_section',
    'type'     => 'number',
    'choices' => array(
        'min' => 2,
        'max' => 99,
        'step' => 2,
    ),
    'default'  =>3,
    'active_callback' => array(
        array(
            'setting'  => 'enable_recent_post_service',
            'operator' => '==',
            'value'    => true,
        ),

    ),
) );


// general panel      

Beautify_Kirki::add_panel( 'general_panel', array(   
    'title'       => __( 'General Settings', 'beautify_pro' ),  
    'description' => __( 'general settings', 'beautify_pro' ),         
) );
//  Page title bar section // 

Beautify_Kirki::add_section( 'header-pagetitle-bar', array(   
    'title'          => __( 'Page Title Bar & Breadcrumb','beautify_pro' ),
    'description'    => __( 'Page Title bar related options', 'beautify_pro'),
    'panel'          => 'general_panel', // Not typically needed.
) ); 
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'global_page_title_bar',
    'label'    => __( 'Check the box if you want to use a global page title bar settings. This option overrides the page options', 'beautify_pro' ),
    'section'  => 'header-pagetitle-bar',
    'type'     => 'checkbox',
    'default' => '0',
) );   

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'page_titlebar',  
    'label'    => __( 'Page Title Bar', 'beautify_pro' ),
    'section'  => 'header-pagetitle-bar', 
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        1 => __( 'Show Bar and Content', 'beautify_pro' ),
        2 => __('Hide','beautify_pro'),
    ),
    'default' => 1,
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'page_titlebar_text',  
    'label'    => __( 'Page Title Bar Text', 'beautify_pro' ),
    'section'  => 'header-pagetitle-bar', 
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        0 => __( 'Show', 'beautify_pro' ),
        1 => __( 'Hide', 'beautify_pro' ), 
    ),
    'default' => 0,
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'breadcrumb',  
    'label'    => __( 'Hide Breadcrumb', 'beautify_pro' ),
    'section'  => 'header-pagetitle-bar', 
    'type'     => 'checkbox',
    'default'  => 0,
) ); 

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'breadcrumb_char',
    'label'    => __( 'Breadcrumb Character', 'beautify_pro' ),
    'section'  => 'header-pagetitle-bar',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        1 => __( ' >> ', 'beautify_pro' ),
        2 => __( ' / ', 'beautify_pro' ),
        3 => __( ' > ', 'beautify_pro' ),
    ),
    'default'  => 1,
    'active_callback' => array(
        array(
            'setting'  => 'breadcrumb',
            'operator' => '==',
            'value'    => 0,
        ),
    ),
    //'sanitize_callback' => 'allow_htmlentities'
) );

//  pagination section // 

Beautify_Kirki::add_section( 'general-pagination', array(   
    'title'          => __( 'Pagination','beautify_pro' ),
    'description'    => __( 'Pagination related options', 'beautify_pro'),
    'panel'          => 'general_panel', // Not typically needed.
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'numeric_pagination',
    'label'    => __( 'Numeric Pagination', 'beautify_pro' ),   
    'section'  => 'general-pagination',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Numbered', 'beautify_pro' ),
        'off' => esc_attr__( 'Next/Previous', 'beautify_pro' )
    ),
    'default'  => 'on',
) );

// skin color panel 

Beautify_Kirki::add_panel( 'skin_color_panel', array(   
    'title'       => __( 'Skin Color', 'beautify_pro' ),  
    'description' => __( 'Color Settings', 'beautify_pro' ),         
) );
// color scheme section 

Beautify_Kirki::add_section( 'multiple_color_section', array(
    'title'          => __( 'Color Scheme','beautify_pro' ),
    'description'    => __( 'Select your color scheme', 'beautify_pro'),
    'panel'          => 'skin_color_panel', // Not typically needed.
    'priority' => 9,
) );  

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'color_scheme',
    'label'    => __( 'Select your color scheme', 'beautify_pro' ),
    'section'  => 'multiple_color_section',
    'type'     => 'palette',
    'choices'     => array( 
        '1' => array( 
            '#fab702',
        ),
        '2' => array(
            '#2c9d56',
        ),
        '3' => array(
            '#F23D4F',
        ),
        '4' => array(
            '#D400CD',
        ),
        '5' => array(
            '#77c100', 
        ),
        '6' => array(
            '#31B3F9',
        ),
    ),
    'default' => '1',
//'default'  => 'on',
) );

/* custom color stylesheet */

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'enable_custom_color_scheme',
    'label'    => __( 'Enable Custom color scheme', 'beautify_pro' ),
    'section'  => 'multiple_color_section',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => 'off',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'custom_color_scheme',
    'label'    => __( 'Select custom color scheme', 'beautify_pro' ),
    'section'  => 'multiple_color_section',
    'type'     => 'color',
    'default'  => '#ffb500',
    'alpha'  => false,
    'active_callback' => array(
        array (
            'setting'  => 'enable_custom_color_scheme',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );


/* pagebuilder style override */
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'enable_so_custom_color',
    'label'    => __( 'Enable this Option to change color choosen by pagebuilder', 'beautify_pro' ),
    'section'  => 'multiple_color_section',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => 'off',
    'tooltip' => __('while change the color scheme this option is also change the pagebuilder row and widget related option color in order to match color scheme','beautify_pro'),

) );

// typography panel //  

Beautify_Kirki::add_panel( 'typography', array( 
    'title'       => __( 'Typography', 'beautify_pro' ),
    'description' => __( 'Typography and Link Color Settings', 'beautify_pro' ),
) );
   
    Beautify_Kirki::add_section( 'typography_section', array(
        'title'          => __( 'General Settings','beautify_pro' ),
        'description'    => __( 'General Settings', 'beautify_pro'),
        'panel'          => 'typography', // Not typically needed.
    ) );
        

    Beautify_Kirki::add_section( 'body_font', array(
        'title'          => __( 'Body Font','beautify_pro' ), 
        'description'    => __( 'Specify the body font properties', 'beautify_pro'),
        'panel'          => 'typography', // Not typically needed.
    ) ); 

    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'body_typography',
        'label'    => __( 'Enable Custom body Settings', 'beautify_pro' ),
        'section'  => 'body_font',
        'type'     => 'switch',
        'choices' => array(
            'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
            'off' => esc_attr__( 'Disable', 'beautify_pro' )
        ),
        'tooltip' => __('Turn on to body typography and turn off for default typography','beautify_pro'),
        'default'  => 'off',
    ) );


    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'body',
        'label'    => __( 'Body Settings', 'beautify_pro' ),
        'section'  => 'body_font', 
        'type'     => 'typography',
        'default'     => array(
            'font-family'    => 'Open Sans', 
            'variant'        => 'regular',
            'font-size'      => '16px',   
            'line-height'    => '1.5',
            'letter-spacing' => '0',
            'color'          => '#8f8f8f', 
        ),
        'output'      => array(
            array(
                'element' => 'body',
                //'suffix' => '!important',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'body_typography',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    ) );


    Beautify_Kirki::add_section( 'heading_section', array(
        'title'          => __( 'Heading Font','beautify_pro' ),
        'description'    => __( 'Specify typography of H1, H2, H3, H4, H5, H6', 'beautify_pro'),
        'panel'          => 'typography', // Not typically needed.
    ) );

    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'heading_one_typography',
        'label'    => __( 'Enable Custom H1 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'switch',
        'choices' => array(
            'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
            'off' => esc_attr__( 'Disable', 'beautify_pro' )
        ),
        'tooltip' => __('Turn on to H1 typography and turn off for default typography','beautify_pro'),
        'default'  => 'off',
    ) );


    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'h1',  
        'label'    => __( 'H1 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'typography',
        'default'     => array(
            'font-family'    => 'Montserrat',
            'variant'        => '700',
            'font-size'      => '48px',
            'line-height'    => '1.8',
            'letter-spacing' => '0',
            'color'          => '#131e32',
        ),
        'output'      => array(
            array(
                'element' => 'h1',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'heading_one_typography',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        
    ) );
    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'heading_two_typography',
        'label'    => __( 'Enable Custom H2 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'switch',
        'choices' => array(
            'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
            'off' => esc_attr__( 'Disable', 'beautify_pro' )
        ),
        'tooltip' => __('Turn on to H2 typography and turn off for default typography','beautify_pro'),
        'default'  => 'off',
    ) );


    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'h2',
        'label'    => __( 'H2 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'typography',
        'default'     => array(
            'font-family'    => 'Montserrat',
            'variant'        => '700',
            'font-size'      => '36px',
            'line-height'    => '1.8',
            'letter-spacing' => '0',
            'color'          => '#131e32',
        ),
        'output'      => array(
            array(
                'element' => 'h2',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'heading_two_typography',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        
    ) );

    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'heading_three_typography',
        'label'    => __( 'Enable Custom H3 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'switch',
        'choices' => array(
            'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
            'off' => esc_attr__( 'Disable', 'beautify_pro' )
        ),
        'tooltip' => __('Turn on to H3 typography and turn off for default typography','beautify_pro'),
        'default'  => 'off',
    ) );


    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'h3',
        'label'    => __( 'H3 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'typography',
        'default' => array(
            'font-family'    => 'Montserrat',
            'variant'        => '700',
            'font-size'      => '30px',
            'line-height'    => '1.8',
            'letter-spacing' => '0',
            'color'          => '#131e32',
        ),
        'output'      => array(
            array(
                'element' => 'h3',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'heading_three_typography',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        
    ) );

    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'heading_four_typography',
        'label'    => __( 'Enable Custom H4 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'switch',
        'choices' => array(
            'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
            'off' => esc_attr__( 'Disable', 'beautify_pro' )
        ),
        'tooltip' => __('Turn on to H4 typography and turn off for default typography','beautify_pro'),
        'default'  => 'off',
    ) );


    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'h4',
        'label'    => __( 'H4 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'typography',
        'default'     => array(
            'font-family'    => 'Montserrat',
            'variant'        => '700',
            'font-size'      => '24px',
            'line-height'    => '1.8',
            'letter-spacing' => '0',
            'color'          => '#131e32',
        ),
        'output'      => array(
            array(
                'element' => 'h4',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'heading_four_typography',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        
    ) );

    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'heading_five_typography',
        'label'    => __( 'Enable Custom H5 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'switch',
        'choices' => array(
            'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
            'off' => esc_attr__( 'Disable', 'beautify_pro' )
        ),
        'tooltip' => __('Turn on to H5 typography and turn off for default typography','beautify_pro'),
        'default'  => 'off',
    ) );



    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'h5',
        'label'    => __( 'H5 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'typography',
        'default'     => array(
            'font-family'    => 'Montserrat',
            'variant'        => '700',
            'font-size'      => '18px',
            'line-height'    => '1.8',
            'letter-spacing' => '0',
            'color'          => '#131e32',
        ),
        'output'      => array(
            array(
                'element' => 'h5',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'heading_five_typography',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    ) );

    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'heading_six_typography',
        'label'    => __( 'Enable Custom H6 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'switch',
        'choices' => array(
            'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
            'off' => esc_attr__( 'Disable', 'beautify_pro' )
        ),
        'tooltip' => __('Turn on to H6 typography and turn off for default typography','beautify_pro'),
        'default'  => 'off',
    ) );



    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'h6',
        'label'    => __( 'H6 Settings', 'beautify_pro' ),
        'section'  => 'heading_section',
        'type'     => 'typography',
        'default'     => array(
            'font-family'    => 'Montserrat', 
            'variant'        => '700',
            'font-size'      => '16px',
            'line-height'    => '1.8',
            'letter-spacing' => '0',
            'color'          => '#131e32',
        ),
        'output'      => array(
            array(
                'element' => 'h6',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'heading_six_typography',
                'operator' => '==',
                'value'    => true,
            ),
        ),
        
    ) );

    // navigation font 
    Beautify_Kirki::add_section( 'navigation_section', array(
        'title'          => __( 'Navigation Font','beautify_pro' ),
        'description'    => __( 'Specify Navigation font properties', 'beautify_pro'),
        'panel'          => 'typography', // Not typically needed.
    ) );

    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'navigation_font_status',
        'label'    => __( 'Enable Navigation Font Settings', 'beautify_pro' ),
        'section'  => 'navigation_section',
        'type'     => 'switch',
        'choices' => array(
            'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
            'off' => esc_attr__( 'Disable', 'beautify_pro' )
        ),
        'tooltip' => __('Turn on to Navigation Font typography and turn off for default typography','beautify_pro'),
        'default'  => 'off',
    ) );

    Beautify_Kirki::add_field( 'beautify_pro', array(
        'settings' => 'navigation_font',
        'label'    => __( 'Navigation Font Settings', 'beautify_pro' ),
        'section'  => 'navigation_section',
        'type'     => 'typography',
        'default'     => array(
            'font-family'    => 'Open Sans',
            'variant'        => '700',
            'font-size'      => '16px',
            'line-height'    => '1.8', 
            'letter-spacing' => '0',
            'color'          => '#ffffff',
        ),
        'output'      => array(
            array(
                'element' => '.main-navigation a',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'navigation_font_status',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    ) );



// header panel //  

Beautify_Kirki::add_panel( 'header_panel', array(     
    'title'       => __( 'Header', 'beautify_pro' ),
    'description' => __( 'Header Related Options', 'beautify_pro' ), 
) );  

/* STICKY HEADER section */     
  
Beautify_Kirki::add_section( 'stricky_header', array(
    'title'          => __( 'Sticky Menu','beautify_pro' ),
    'description'    => __( 'sticky header', 'beautify_pro'),
    'panel'          => 'header_panel', // Not typically needed.
) );
Beautify_Kirki::add_field( 'beautify_pro', array(    
    'settings' => 'sticky_header',
    'label'    => __( 'Enable Sticky Header', 'beautify_pro' ),
    'section'  => 'stricky_header',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => 'on',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'sticky_header_position',
    'label'    => __( 'Enable Sticky Header Position', 'beautify_pro' ),
    'section'  => 'stricky_header',
    'type'     => 'radio-buttonset',
    'choices' => array(
        'top'  => esc_attr__( 'Top', 'beautify_pro' ),
        'bottom' => esc_attr__( 'Bottom', 'beautify_pro' )
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'sticky_header',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'default'  => 'top',
) );


/*
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'header_top_margin',
    'label'    => __( 'Header Top Margin', 'beautify_pro' ),
    'description' => __('Select the top margin of header in pixels','beautify_pro'),
    'section'  => 'header',
    'type'     => 'number',
    'choices' => array(
        'min' => 1,
        'max' => 1000,
        'step' => 1,
    ),
    //'default'  => '213',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'header_bottom_margin',
    'label'    => __( 'Header Bottom Margin', 'beautify_pro' ),
    'description' => __('Select the bottom margin of header in pixels','beautify_pro'),
    'section'  => 'header',
    'type'     => 'number',
    'choices' => array(
        'min' => 1,
        'max' => 1000,
        'step' => 1,
    ),
    //'default'  => '213',
) );*/

Beautify_Kirki::add_section( 'header_image', array(
    'title'          => __( 'Header Background Video & Image','beautify_pro' ),
    'description'    => __( 'Custom Header Video & Image options', 'beautify_pro'),
    'panel'          => 'header_panel', // Not typically needed.  
) );

Beautify_Kirki::add_field( 'beautify_pro', array(   
    'settings' => 'header_bg_size',
    'label'    => __( 'Header Background Size', 'beautify_pro' ),
    'section'  => 'header_image',
    'type'     => 'radio-buttonset', 
    'choices' => array(
        'cover'  => esc_attr__( 'Cover', 'beautify_pro' ),
        'contain' => esc_attr__( 'Contain', 'beautify_pro' ),
        'auto'  => esc_attr__( 'Auto', 'beautify_pro' ),
        'inherit'  => esc_attr__( 'Inherit', 'beautify_pro' ),
    ),
    'output'   => array(
        array(
            'element'  => '.header-image',
            'property' => 'background-size',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'header_image',
            'operator' => '!=',
            'value'    => 'remove-header',
        ),
    ),
    'default'  => 'cover',
    'tooltip' => __('Header Background Image Size','beautify_pro'),
) );

/*Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'header_height',
    'label'    => __( 'Header Background Image Height', 'beautify_pro' ),
    'section'  => 'header_image',
    'type'     => 'number',
    'choices' => array(
        'min' => 100,
        'max' => 600,
        'step' => 1,
    ),
    'default'  => '213',
) ); */
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'header_bg_repeat',
    'label'    => __( 'Header Background Repeat', 'beautify_pro' ),
    'section'  => 'header_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'no-repeat' => esc_attr__('No Repeat', 'beautify_pro'),
        'repeat' => esc_attr__('Repeat', 'beautify_pro'),
        'repeat-x' => esc_attr__('Repeat Horizontally','beautify_pro'),
        'repeat-y' => esc_attr__('Repeat Vertically','beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.header-image',
            'property' => 'background-repeat',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'header_image',
            'operator' => '!=',
            'value'    => 'remove-header',
        ),
    ),
    'default'  => 'repeat',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'header_bg_position', 
    'label'    => __( 'Header Background Position', 'beautify_pro' ),
    'section'  => 'header_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'center top' => esc_attr__('Center Top', 'beautify_pro'),
        'center center' => esc_attr__('Center Center', 'beautify_pro'),
        'center bottom' => esc_attr__('Center Bottom', 'beautify_pro'),
        'left top' => esc_attr__('Left Top', 'beautify_pro'),
        'left center' => esc_attr__('Left Center', 'beautify_pro'),
        'left bottom' => esc_attr__('Left Bottom', 'beautify_pro'),
        'right top' => esc_attr__('Right Top', 'beautify_pro'),
        'right center' => esc_attr__('Right Center', 'beautify_pro'),
        'right bottom' => esc_attr__('Right Bottom', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.header-image',
            'property' => 'background-position',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'header_image',
            'operator' => '!=',
            'value'    => 'remove-header',
        ),
    ),
    'default'  => 'center center',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'header_bg_attachment',
    'label'    => __( 'Header Background Attachment', 'beautify_pro' ),
    'section'  => 'header_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'scroll' => esc_attr__('Scroll', 'beautify_pro'),
        'fixed' => esc_attr__('Fixed', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.header-image',
            'property' => 'background-attachment',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'header_image',
            'operator' => '!=',
            'value'    => 'remove-header',
        ),
    ),
    'default'  => 'scroll',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'header_overlay',
    'label'    => __( 'Enable Header( Background ) Overlay', 'beautify_pro' ),
    'section'  => 'header_image',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => 'off',
) );
  
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'header_overlay_color',
    'label'    => __( 'Header Overlay ( Background )color', 'beautify_pro' ),
    'section'  => 'header_image',
    'type'     => 'color',
    'alpha' => true,
    'default'  => '#E5493A', 
    'output'   => array(
        array(
            'element'  => '.overlay-header',
            'property' => 'background-color',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'header_overlay',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

/*
/* e-option start */
/*
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'custon_favicon',
    'label'    => __( 'Custom Favicon', 'beautify_pro' ),
    'section'  => 'header',
    'type'     => 'upload',
    'default'  => '',
) ); */
/* e-option start */ 
/* Blog page section */


/* Blog panel */

Beautify_Kirki::add_panel( 'blog_panel', array(     
    'title'       => __( 'Blog', 'beautify_pro' ),
    'description' => __( 'Blog Related Options', 'beautify_pro' ),     
) ); 
Beautify_Kirki::add_section( 'blog', array(
    'title'          => __( 'Blog Page','beautify_pro' ),
    'description'    => __( 'Blog Related Options', 'beautify_pro'),
    'panel'          => 'blog_panel', // Not typically needed.
) );
  
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'blog_layout',
    'label'    => __( 'Select Blog Page Layout you prefer', 'beautify_pro' ),
    'section'  => 'blog',
    'type'     => 'select',
    'multiple'  => 1,
    'choices' => array(
        1  => esc_attr__( 'Default ( One Column )', 'beautify_pro' ),
        2 => esc_attr__( 'Two Columns ', 'beautify_pro' ),
        3 => esc_attr__( 'Three Columns ( Without Sidebar ) ', 'beautify_pro' ),
        4 => esc_attr__( 'Two Columns With Masonry', 'beautify_pro' ),
        5 => esc_attr__( 'Three Columns With Masonry ( Without Sidebar ) ', 'beautify_pro' ),
        6 => esc_attr__( 'Blog FullWidth', 'beautify_pro' ),
    ),
    'default'  => 1,
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'featured_image',
    'label'    => __( 'Enable Featured Image', 'beautify_pro' ),
    'section'  => 'blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
    'tooltip' => __('Enable Featured Image for blog page','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'more_text',
    'label'    => __( 'More Text', 'beautify_pro' ),
    'section'  => 'blog',
    'type'     => 'text',
    'description' => __('Text to display in case of text too long','beautify_pro'),
    'default' => __('Read More','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'featured_image_size',
    'label'    => __( 'Choose the Featured Image Size for Blog Page', 'beautify_pro' ),
    'section'  => 'blog',
    'type'     => 'select',
    'multiple'  => 1,
    'choices' => array(
        1 => esc_attr__( 'Large Featured Image', 'beautify_pro' ),
        2 => esc_attr__( 'Small Featured Image', 'beautify_pro' ),
        3 => esc_attr__( 'Original Size', 'beautify_pro' ),
        4 => esc_attr__( 'Medium', 'beautify_pro' ),
        5 => esc_attr__( 'Large', 'beautify_pro' ), 
    ),
    'default'  => 1,
    'active_callback' => array(
        array(
            'setting'  => 'featured_image',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'tooltip' => __('Set large and medium image size: Goto Dashboard => Settings => Media', 'beautify_pro') ,
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'enable_single_post_top_meta',
    'label'    => __( 'Enable to display top post meta data', 'beautify_pro' ),
    'section'  => 'blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
    'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'single_post_top_meta',
    'label'    => __( 'Activate and Arrange the Order of Top Post Meta elements', 'beautify_pro' ),
    'section'  => 'blog',
    'type'     => 'sortable',
    'choices'     => array(
        1 => esc_attr__( 'date', 'beautify_pro' ),
        2 => esc_attr__( 'author', 'beautify_pro' ),
        3 => esc_attr__( 'comment', 'beautify_pro' ),
        4 => esc_attr__( 'category', 'beautify_pro' ),
        5 => esc_attr__( 'tags', 'beautify_pro' ),
        6 => esc_attr__( 'edit', 'beautify_pro' ),
    ),
    'default'  => array(1, 2, 3,6),
    'active_callback' => array(
        array(
            'setting'  => 'enable_single_post_top_meta',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','beautify_pro'),

) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'enable_single_post_bottom_meta',
    'label'    => __( 'Enable to display bottom post meta data', 'beautify_pro' ),
    'section'  => 'blog', 
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','beautify_pro'),
    'default'  => 'on',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'single_post_bottom_meta',
    'label'    => __( 'Activate and arrange the Order of Bottom Post Meta elements', 'beautify_pro' ),
    'section'  => 'blog',    
    'type'     => 'sortable',
    'choices'     => array(
        1 => esc_attr__( 'date', 'beautify_pro' ),
        2 => esc_attr__( 'author', 'beautify_pro' ),
        3 => esc_attr__( 'comment', 'beautify_pro' ),
        4 => esc_attr__( 'category', 'beautify_pro' ),
        5 => esc_attr__( 'tags', 'beautify_pro' ),
        6 => esc_attr__( 'edit', 'beautify_pro' ),
    ),
    'default'  => array(4,5),
    'active_callback' => array(
        array(
            'setting'  => 'enable_single_post_bottom_meta',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','beautify_pro'),
) );


/* Single Blog page section */

Beautify_Kirki::add_section( 'single_blog', array(
    'title'          => __( 'Single Blog Page','beautify_pro' ),
    'description'    => __( 'Single Blog Page Related Options', 'beautify_pro'),
    'panel'          => 'blog_panel', // Not typically needed.
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'single_featured_image',
    'label'    => __( 'Enable Single Post Featured Image', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
    'tooltip' => __('Enable Featured Image for Single Post Page','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'single_featured_image_size',
    'label'    => __( 'Choose the featured image display type for Single Post Page', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'radio',
    'choices' => array(
        1  => esc_attr__( 'Large Featured Image', 'beautify_pro' ),
        2 => esc_attr__( 'Small Featured Image', 'beautify_pro' ),
        3 => esc_attr__( 'FullWidth Featured Image', 'beautify_pro' ),
    ),
    'default'  => 1,
    'active_callback' => array(
        array(
            'setting'  => 'single_featured_image',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'author_bio_box',
    'label'    => __( 'Enable Author Bio Box below single post', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'off',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'related_posts',
    'label'    => __( 'Show Related Posts', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'off',
    'tooltip' => __('Show the Related Post for Single Blog Page','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'related_posts_hierarchy',
    'label'    => __( 'Related Posts Must Be Shown As:', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'radio',
    'choices' => array(
        1  => esc_attr__( 'Related Posts By Tags', 'beautify_pro' ),
        2 => esc_attr__( 'Related Posts By Categories', 'beautify_pro' ) 
    ),
    'default'  => 1,
    'active_callback' => array(
        array(
            'setting'  => 'related_posts',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'tooltip' => __('Select the Hierarchy','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'comments',
    'label'    => __( ' Show Comments', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
    'tooltip' => __('Show the Comments for Single Blog Page','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'social_sharing_box',
    'label'    => __( 'Show social sharing options box below single post', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
) );

//social sharing box section

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'facebook_sb',
    'label'    => __( 'Enable facebook sharing option below single post', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
    'active_callback' => array(
        array (
            'setting'  => 'social_sharing_box',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'twitter_sb',
    'label'    => __( 'Enable twitter sharing option below single post', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
    'active_callback' => array(
        array (
            'setting'  => 'social_sharing_box',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'linkedin_sb',
    'label'    => __( 'Enable linkedin sharing option below single post', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
    'active_callback' => array(
        array (
            'setting'  => 'social_sharing_box',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'google-plus_sb',
    'label'    => __( 'Enable googleplus sharing option below single post', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
    'active_callback' => array(
        array (
            'setting'  => 'social_sharing_box',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'email_sb',
    'label'    => __( 'Enable email sharing option below single post', 'beautify_pro' ),
    'section'  => 'single_blog',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
    'active_callback' => array(
        array (
            'setting'  => 'social_sharing_box',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
/* FOOTER SECTION 
footer panel */

Beautify_Kirki::add_panel( 'footer_panel', array(     
    'title'       => __( 'Footer', 'beautify_pro' ),
    'description' => __( 'Footer Related Options', 'beautify_pro' ),     
) );  

Beautify_Kirki::add_section( 'footer', array(
    'title'          => __( 'Footer','beautify_pro' ),
    'description'    => __( 'Footer related options', 'beautify_pro'),
    'panel'          => 'footer_panel', // Not typically needed.
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_widgets',
    'label'    => __( 'Footer Widget Area', 'beautify_pro' ),
    'description' => sprintf(__('Select widgets, Goto <a href="%1$s"target="_blank"> Customizer </a> => Widgets','beautify_pro'),admin_url('customize.php') ),
    'section'  => 'footer',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
) );
/* Choose No.Of Footer area */
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_widgets_count',
    'label'    => __( 'Choose No.of widget area you want in footer', 'beautify_pro' ),
    'section'  => 'footer',
    'type'     => 'radio-buttonset',
    'choices' => array(
        1  => esc_attr__( '1', 'beautify_pro' ),
        2  => esc_attr__( '2', 'beautify_pro' ),
        3  => esc_attr__( '3', 'beautify_pro' ),
        4  => esc_attr__( '4', 'beautify_pro' ),
    ),
    'default'  => 3,
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'copyright',
    'label'    => __( 'Footer Copyright Text', 'beautify_pro' ),
    'section'  => 'footer',
    'type'     => 'textarea',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_top_margin',
    'label'    => __( 'Footer Top Margin', 'beautify_pro' ),
    'description' => __('Select the top margin of footer in pixels','beautify_pro'),
    'section'  => 'footer',
    'type'     => 'number',
    'choices' => array(
        'min' => 1,
        'max' => 1000,
        'step' => 1, 
    ),
    'output'   => array(
        array(
            'element'  => '.site-footer',
            'property' => 'margin-top',
            'units' => 'px',
        ),
    ),
    'default'  => 0,
) );

/* CUSTOM FOOTER BACKGROUND IMAGE 
footer background image section  */

Beautify_Kirki::add_section( 'footer_image', array(
    'title'          => __( 'Footer Image','beautify_pro' ),
    'description'    => __( 'Custom Footer Image options', 'beautify_pro'),
    'panel'          => 'footer_panel', // Not typically needed.
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_image',
    'label'    => __( 'Upload Footer Background Image', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'upload',
    'default'  => '',
    'output'   => array(
        array(
            'element'  => '.footer-image',
            'property' => 'background-image',
        ),
    ),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_size',
    'label'    => __( 'Footer Background Size', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'radio-buttonset',
    'choices' => array(
        'cover'  => esc_attr__( 'Cover', 'beautify_pro' ),
        'contain' => esc_attr__( 'Contain', 'beautify_pro' ),
        'auto'  => esc_attr__( 'Auto', 'beautify_pro' ),
        'inherit'  => esc_attr__( 'Inherit', 'beautify_pro' ),
    ),
    'output'   => array(
        array(
            'element'  => '.footer-image',
            'property' => 'background-size',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_bg_image',
            'operator' => '=',
            'value'    => true,
        ),
    ),
    'default'  => 'cover',
    'tooltip' => __('Footer Background Image Size','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_repeat',
    'label'    => __( 'Footer Background Repeat', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'no-repeat' => esc_attr__('No Repeat', 'beautify_pro'),
        'repeat' => esc_attr__('Repeat', 'beautify_pro'),
        'repeat-x' => esc_attr__('Repeat Horizontally','beautify_pro'),
        'repeat-y' => esc_attr__('Repeat Vertically','beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.footer-image',   
            'property' => 'background-repeat',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_bg_image',
            'operator' => '=',
            'value'    => true,
        ),
    ),
    'default'  => 'repeat',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_position',
    'label'    => __( 'Footer Background Position', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'center top' => esc_attr__('Center Top', 'beautify_pro'),
        'center center' => esc_attr__('Center Center', 'beautify_pro'),
        'center bottom' => esc_attr__('Center Bottom', 'beautify_pro'),
        'left top' => esc_attr__('Left Top', 'beautify_pro'),
        'left center' => esc_attr__('Left Center', 'beautify_pro'),
        'left bottom' => esc_attr__('Left Bottom', 'beautify_pro'),
        'right top' => esc_attr__('Right Top', 'beautify_pro'),
        'right center' => esc_attr__('Right Center', 'beautify_pro'),
        'right bottom' => esc_attr__('Right Bottom', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.footer-image',
            'property' => 'background-position',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_bg_image',
            'operator' => '=',
            'value'    => true,
        ),
    ),
    'default'  => 'center center',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_attachment',
    'label'    => __( 'Footer Background Attachment', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'scroll' => esc_attr__('Scroll', 'beautify_pro'),
        'fixed' => esc_attr__('Fixed', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.footer-image',
            'property' => 'background-attachment',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_bg_image',
            'operator' => '=',
            'value'    => true,
        ),
    ),
    'default'  => 'scroll',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_overlay',
    'label'    => __( 'Enable Footer( Background ) Overlay', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => 'off',
) );
  
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_overlay_color',
    'label'    => __( 'Footer Overlay ( Background )color', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'color',
    'alpha' => true,
    'default'  => '', 
    'active_callback' => array(
        array(
            'setting'  => 'footer_overlay',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'output'   => array(
        array(
            'element'  => '.footer_image',
            'property' => 'background-color',
        ),
    ),
) );


// single page section //

Beautify_Kirki::add_section( 'single_page', array(
    'title'          => __( 'Single Page','beautify_pro' ),
    'description'    => __( 'Single Page Related Options', 'beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'single_page_featured_image',
    'label'    => __( 'Enable Single Page Featured Image', 'beautify_pro' ),
    'section'  => 'single_page',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'single_page_featured_image_size',
    'label'    => __( 'Single Page Featured Image Size', 'beautify_pro' ),
    'section'  => 'single_page',
    'type'     => 'radio-buttonset',
    'choices' => array(
        1  => esc_attr__( 'Normal', 'beautify_pro' ),
        2 => esc_attr__( 'FullWidth', 'beautify_pro' ) 
    ),
    'default'  => 1,
    'active_callback' => array(
        array(
            'setting'  => 'single_page_featured_image',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

// Layout section //

Beautify_Kirki::add_section( 'layout', array( 
    'title'          => __( 'Layout','beautify_pro' ),
    'description'    => __( 'Layout Related Options', 'beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'site-style',
    'label'    => __( 'Site Style', 'beautify_pro' ),
    'section'  => 'layout',
    'type'     => 'radio-buttonset',
    'choices' => array(
        'wide' =>  esc_attr__('Wide', 'beautify_pro'),
        'boxed' =>  esc_attr__('Boxed', 'beautify_pro'),
        'fluid' =>  esc_attr__('Fluid', 'beautify_pro'),  
        //'static' =>  esc_attr__('Static ( Non Responsive )', 'beautify_pro'),
    ),
    'default'  => 'wide',
    'tooltip' => __('Choose the default site layout.','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'global_sidebar_layout',
    'label'    => __( 'Check the box if you want to use a global sidebar on all pages. This option overrides the page options', 'beautify_pro' ),
    'section'  => 'layout',
    'type'     => 'checkbox',
    'default' => '0',
) );


Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'sidebar_position',
    'label'    => __( 'Main Layout', 'beautify_pro' ),
    'section'  => 'layout',
    'type'     => 'radio-image',   
    'description' => __('Select main content and sidebar arrangement.','beautify_pro'),
    'choices' => array(
        'left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cl.png',
        'right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cr.png',
        'two-sidebar' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cm.png',  
        'two-sidebar-left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cl.png',
        'two-sidebar-right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cr.png',
        'fullwidth' =>  get_template_directory_uri() . '/admin/kirki/assets/images/1c.png',
        'no-sidebar' =>  get_template_directory_uri() . '/images/no-sidebar.png',
    ),
    'default'  => 'right', 
    'tooltip' => __('global sidebar on all pages. This option overrides the page layout sidebar options','beautify_pro'),
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'body_top_margin',
    'label'    => __( 'Body Top Margin', 'beautify_pro' ),
    'description' => __('Select the top margin of body element in pixels','beautify_pro'),
    'section'  => 'layout',
    'type'     => 'number',
    'choices' => array(
        'min' => 0,
        'max' => 200,
        'step' => 1,
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'site-style',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    ),
    'output'   => array(
        array(
            'element'  => 'body',
            'property' => 'margin-top',
            'units'    => 'px',
        ),
    ),
    'default'  => 0,
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'body_bottom_margin',
    'label'    => __( 'Body Bottom Margin', 'beautify_pro' ),
    'description' => __('Select the bottom margin of body element in pixels','beautify_pro'),
    'section'  => 'layout',
    'type'     => 'number',
    'choices' => array(
        'min' => 0,
        'max' => 200,
        'step' => 1,
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'site-style',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    ),
    'output'   => array(
        array(
            'element'  => 'body',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ),
    ),
    'default'  => 0,
) );

/* LAYOUT SECTION  */
/*
Beautify_Kirki::add_section( 'layout', array(
    'title'          => __( 'Layout','beautify_pro' ),   
    'description'    => __( 'Layout settings that affects overall site', 'beautify_pro'),
    'panel'          => 'beautify_pro_options', // Not typically needed.
) );



Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'primary_sidebar_width',
    'label'    => __( 'Primary Sidebar Width', 'beautify_pro' ),
    'section'  => 'layout',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        '1' => __( 'One Column', 'beautify_pro' ),
        '2' => __( 'Two Column', 'beautify_pro' ),
        '3' => __( 'Three Column', 'beautify_pro' ),
        '4' => __( 'Four Column', 'beautify_pro' ),
        '5' => __( 'Five Column ', 'beautify_pro' ),
    ),
    'default'  => '5',  
    'tooltip' => __('Select the width of the Primary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'secondary_sidebar_width',
    'label'    => __( 'Secondary Sidebar Width', 'beautify_pro' ),
    'section'  => 'layout',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        '1' => __( 'One Column', 'beautify_pro' ),
        '2' => __( 'Two Column', 'beautify_pro' ),
        '3' => __( 'Three Column', 'beautify_pro' ),
        '4' => __( 'Four Column', 'beautify_pro' ),
        '5' => __( 'Five Column ', 'beautify_pro' ),
    ),            
    'default'  => '5',  
    'tooltip' => __('Select the width of the Secondary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','beautify_pro'),
) ); 

*/

/* FOOTER SECTION 
footer panel */

Beautify_Kirki::add_panel( 'footer_panel', array(     
    'title'       => __( 'Footer', 'beautify_pro' ),
    'description' => __( 'Footer Related Options', 'beautify_pro' ),     
) );  

Beautify_Kirki::add_section( 'footer', array(
    'title'          => __( 'Footer','beautify_pro' ),
    'description'    => __( 'Footer related options', 'beautify_pro'),
    'panel'          => 'footer_panel', // Not typically needed.
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_widgets',
    'label'    => __( 'Footer Widget Area', 'beautify_pro' ),
    'description' => sprintf(__('Select widgets, Goto <a href="%1$s"target="_blank"> Customizer </a> => Widgets','beautify_pro'),admin_url('customize.php') ),
    'section'  => 'footer',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
) );
/* Choose No.Of Footer area */
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_widgets_count',
    'label'    => __( 'Choose No.of widget area you want in footer', 'beautify_pro' ),
    'section'  => 'footer',
    'type'     => 'radio-buttonset',
    'choices' => array(
        1  => esc_attr__( '1', 'beautify_pro' ),
        2  => esc_attr__( '2', 'beautify_pro' ),
        3  => esc_attr__( '3', 'beautify_pro' ),
        4  => esc_attr__( '4', 'beautify_pro' ),
    ),
    'default'  => 4,
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'copyright',
    'label'    => __( 'Footer Copyright Text', 'beautify_pro' ),
    'section'  => 'footer',
    'type'     => 'textarea',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_top_margin',
    'label'    => __( 'Footer Top Margin', 'beautify_pro' ),
    'description' => __('Select the top margin of footer in pixels','beautify_pro'),
    'section'  => 'footer',
    'type'     => 'number',
    'choices' => array(
        'min' => 1,
        'max' => 1000,
        'step' => 1, 
    ),
    'output'   => array(
        array(
            'element'  => '.site-footer',
            'property' => 'margin-top',
            'units' => 'px',
        ),
    ),
    'default'  => 0,
) );

/* CUSTOM FOOTER BACKGROUND IMAGE 
footer background image section  */

Beautify_Kirki::add_section( 'footer_image', array(
    'title'          => __( 'Footer Image','beautify_pro' ),
    'description'    => __( 'Custom Footer Image options', 'beautify_pro'),
    'panel'          => 'footer_panel', // Not typically needed.
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_image',
    'label'    => __( 'Upload Footer Background Image', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'upload',
    'default'  => '',
    'output'   => array(
        array(
            'element'  => '.footer-image',
            'property' => 'background-image',
        ),
    ),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_size',
    'label'    => __( 'Footer Background Size', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'radio-buttonset',
    'choices' => array(
        'cover'  => esc_attr__( 'Cover', 'beautify_pro' ),
        'contain' => esc_attr__( 'Contain', 'beautify_pro' ),
        'auto'  => esc_attr__( 'Auto', 'beautify_pro' ),
        'inherit'  => esc_attr__( 'Inherit', 'beautify_pro' ),
    ),
    'output'   => array(
        array(
            'element'  => '.footer-image',
            'property' => 'background-size',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_bg_image',
            'operator' => '=',
            'value'    => true,
        ),
    ),
    'default'  => 'cover',
    'tooltip' => __('Footer Background Image Size','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_repeat',
    'label'    => __( 'Footer Background Repeat', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'no-repeat' => esc_attr__('No Repeat', 'beautify_pro'),
        'repeat' => esc_attr__('Repeat', 'beautify_pro'),
        'repeat-x' => esc_attr__('Repeat Horizontally','beautify_pro'),
        'repeat-y' => esc_attr__('Repeat Vertically','beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.footer-image',
            'property' => 'background-repeat',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_bg_image',
            'operator' => '=',
            'value'    => true,
        ),
    ),
    'default'  => 'repeat',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_position',
    'label'    => __( 'Footer Background Position', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'center top' => esc_attr__('Center Top', 'beautify_pro'),
        'center center' => esc_attr__('Center Center', 'beautify_pro'),
        'center bottom' => esc_attr__('Center Bottom', 'beautify_pro'),
        'left top' => esc_attr__('Left Top', 'beautify_pro'),
        'left center' => esc_attr__('Left Center', 'beautify_pro'),
        'left bottom' => esc_attr__('Left Bottom', 'beautify_pro'),
        'right top' => esc_attr__('Right Top', 'beautify_pro'),
        'right center' => esc_attr__('Right Center', 'beautify_pro'),
        'right bottom' => esc_attr__('Right Bottom', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.footer-image',
            'property' => 'background-position',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_bg_image',
            'operator' => '=',
            'value'    => true,
        ),
    ),
    'default'  => 'center center',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_bg_attachment',
    'label'    => __( 'Footer Background Attachment', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'scroll' => esc_attr__('Scroll', 'beautify_pro'),
        'fixed' => esc_attr__('Fixed', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.footer-image',
            'property' => 'background-attachment',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_bg_image',
            'operator' => '=',
            'value'    => true,
        ),
    ),
    'default'  => 'scroll',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_overlay',
    'label'    => __( 'Enable Footer( Background ) Overlay', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => 'off',
) );
  
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'footer_overlay_color',
    'label'    => __( 'Footer Overlay ( Background )color', 'beautify_pro' ),
    'section'  => 'footer_image',
    'type'     => 'color',
    'alpha' => true,
    'default'  => '#E5493A', 
    'active_callback' => array(
        array(
            'setting'  => 'footer_overlay',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'output'   => array(
        array(
            'element'  => '.overlay-footer',
            'property' => 'background-color',
        ),
    ),
) );


 if( class_exists( 'WooCommerce' ) ) {
    Beautify_Kirki::add_section( 'woocommerce_section', array(
        'title'          => __( 'WooCommerce','beautify_pro' ),
        'description'    => __( 'Theme options related to woocommerce', 'beautify_pro'),
        'priority'       => 11, 
        'theme_supports' => '', // Rarely needed.
    ) );
    Beautify_Kirki::add_field( 'woocommerce', array(
        'settings' => 'woocommerce_sidebar',
        'label'    => __( 'Enable Woocommerce Sidebar', 'beautify_pro' ),
        'description' => __('Enable Sidebar for shop page','beautify_pro'),
        'section'  => 'woocommerce_section',
        'type'     => 'switch',
        'choices' => array(
            'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
            'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
        ),

        'default'  => 'on',
    ) );
}
    
// background color ( rename )

Beautify_Kirki::add_section( 'colors', array(
    'title'          => __( 'Background Color','beautify_pro' ),
    'description'    => __( 'This will affect overall site background color', 'beautify_pro'),
    //'panel'          => 'skin_color_panel', // Not typically needed.
    'priority' => 11,
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'general_background_color',
    'label'    => __( 'General Background Color', 'beautify_pro' ),
    'section'  => 'colors',
    'type'     => 'color',
    'alpha' => true,
    'default'  => '#ffffff',
    'output'   => array(
        array(
            'element'  => 'body',
            'property' => 'background-color',
        ),
    ),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'content_background_color',
    'label'    => __( 'Content Background Color', 'beautify_pro' ),
    'section'  => 'colors',
    'type'     => 'color',
    'description' => __('when you are select boxed layout content background color will reflect the grid area','beautify_pro'), 
    'alpha' => true, 
    'default'  => '#ffffff',
    'output'   => array(
        array(
            'element'  => '.boxed-container',
            'property' => 'background-color',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'site-style',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    ),
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'general_background_image',
    'label'    => __( 'General Background Image', 'beautify_pro' ),
    'section'  => 'background_image',
    'type'     => 'upload',
    'default'  => '',
    'output'   => array(
        array(
            'element'  => 'body',
            'property' => 'background-image',
        ),
    ),
) );

// background image ( general & boxed layout ) //


Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'general_background_repeat',
    'label'    => __( 'General Background Repeat', 'beautify_pro' ),
    'section'  => 'background_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'no-repeat' => esc_attr__('No Repeat', 'beautify_pro'),
        'repeat' => esc_attr__('Repeat', 'beautify_pro'),
        'repeat-x' => esc_attr__('Repeat Horizontally','beautify_pro'),
        'repeat-y' => esc_attr__('Repeat Vertically','beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => 'body',
            'property' => 'background-repeat',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'general_background_image',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'default'  => 'repeat',  
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'general_background_size',
    'label'    => __( 'General Background Size', 'beautify_pro' ),
    'section'  => 'background_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices' => array(
        'cover'  => esc_attr__( 'Cover', 'beautify_pro' ),
        'contain' => esc_attr__( 'Contain', 'beautify_pro' ),
        'auto'  => esc_attr__( 'Auto', 'beautify_pro' ),
        'inherit'  => esc_attr__( 'Inherit', 'beautify_pro' ),
    ),
    'output'   => array(
        array(
            'element'  => 'body',
            'property' => 'background-size',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'general_background_image',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'default'  => 'cover',  
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'general_background_attachment',
    'label'    => __( 'General Background Attachment', 'beautify_pro' ),
    'section'  => 'background_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'scroll' => esc_attr__('Scroll', 'beautify_pro'),
        'fixed' => esc_attr__('Fixed', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => 'body',
            'property' => 'background-attachment',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'general_background_image',
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'default'  => 'fixed',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'general_background_position',
    'label'    => __( 'General Background Position', 'beautify_pro' ),
    'section'  => 'background_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'center top' => esc_attr__('Center Top', 'beautify_pro'),
        'center center' => esc_attr__('Center Center', 'beautify_pro'),
        'center bottom' => esc_attr__('Center Bottom', 'beautify_pro'),
        'left top' => esc_attr__('Left Top', 'beautify_pro'),
        'left center' => esc_attr__('Left Center', 'beautify_pro'),
        'left bottom' => esc_attr__('Left Bottom', 'beautify_pro'),
        'right top' => esc_attr__('Right Top', 'beautify_pro'),
        'right center' => esc_attr__('Right Center', 'beautify_pro'),
        'right bottom' => esc_attr__('Right Bottom', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => 'body',
            'property' => 'background-position',
        ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'general_background_image', 
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'default'  => 'center top',  
) );


/* CONTENT BACKGROUND ( boxed background image )*/

Beautify_Kirki::add_field( 'beautify_pro', array(  
    'settings' => 'content_background_image',
    'label'    => __( 'Content Background Image', 'beautify_pro' ),
    'description' => __('when you are select boxed layout content background image will reflect the grid area','beautify_pro'),
    'section'  => 'background_image',
    'type'     => 'upload',
    'default'  => '',
    'output'   => array(
        array(
            'element'  => '.boxed-container',
            'property' => 'background-image',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'site-style',
            'operator' => '==',
            'value'    => 'boxed',
        ),
    ),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'content_background_repeat',
    'label'    => __( 'Content Background Repeat', 'beautify_pro' ),
    'section'  => 'background_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'no-repeat' => esc_attr__('No Repeat', 'beautify_pro'),
        'repeat' => esc_attr__('Repeat', 'beautify_pro'),
        'repeat-x' => esc_attr__('Repeat Horizontally','beautify_pro'),
        'repeat-y' => esc_attr__('Repeat Vertically','beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.boxed-container',
            'property' => 'background-repeat',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'site-style',
            'operator' => '==',
            'value'    => 'boxed',
        ),
        array(
            'setting'  => 'content_background_image', 
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'default'  => 'repeat',  
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'content_background_size',
    'label'    => __( 'Content Background Size', 'beautify_pro' ),
    'section'  => 'background_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices' => array(
        'cover'  => esc_attr__( 'Cover', 'beautify_pro' ),
        'contain' => esc_attr__( 'Contain', 'beautify_pro' ),
        'auto'  => esc_attr__( 'Auto', 'beautify_pro' ),
        'inherit'  => esc_attr__( 'Inherit', 'beautify_pro' ),
    ),
    'output'   => array(
        array(
            'element'  => '.boxed-container',
            'property' => 'background-size',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'site-style',
            'operator' => '==',
            'value'    => 'boxed',
        ),
        array(
            'setting'  => 'content_background_image', 
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'default'  => 'cover',  
) );

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'content_background_attachment',
    'label'    => __( 'Content Background Attachment', 'beautify_pro' ),
    'section'  => 'background_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'scroll' => esc_attr__('Scroll', 'beautify_pro'),
        'fixed' => esc_attr__('Fixed', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.boxed-container',
            'property' => 'background-attachment',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'site-style',
            'operator' => '==',
            'value'    => 'boxed',
        ),
        array(
            'setting'  => 'content_background_image', 
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'default'  => 'fixed',  
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'content_background_position',
    'label'    => __( 'Content Background Position', 'beautify_pro' ),
    'section'  => 'background_image',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'center top' => esc_attr__('Center Top', 'beautify_pro'),
        'center center' => esc_attr__('Center Center', 'beautify_pro'),
        'center bottom' => esc_attr__('Center Bottom', 'beautify_pro'),
        'left top' => esc_attr__('Left Top', 'beautify_pro'),
        'left center' => esc_attr__('Left Center', 'beautify_pro'),
        'left bottom' => esc_attr__('Left Bottom', 'beautify_pro'),
        'right top' => esc_attr__('Right Top', 'beautify_pro'),
        'right center' => esc_attr__('Right Center', 'beautify_pro'),
        'right bottom' => esc_attr__('Right Bottom', 'beautify_pro'),
    ),
    'output'   => array(
        array(
            'element'  => '.boxed-container',
            'property' => 'background-position',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'  => 'site-style',
            'operator' => '==',
            'value'    => 'boxed',
        ),
        array(
            'setting'  => 'content_background_image', 
            'operator' => '==',
            'value'    => true,
        ),
    ),
    'default'  => 'center top',  
) );

/* pro theme options */

//  animation section 

Beautify_Kirki::add_section( 'animation_section', array(
    'title'          => __( 'Animation','beautify_pro' ),
    'description'    => __( 'Animation that affects overall site', 'beautify_pro'),
    'panel'          => 'general_panel', // Not typically needed.
) );    

Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'animation_effect',
    'label'    => __( 'Enable Animation Effect', 'beautify_pro' ),   
    'section'  => 'animation_section',
    'type'     => 'switch',
    'choices' => array(
        'on'  => esc_attr__( 'Enable', 'beautify_pro' ),
        'off' => esc_attr__( 'Disable', 'beautify_pro' ) 
    ),
    'default'  => 'on',
) );

// custom JS section

Beautify_Kirki::add_section( 'custom_js_section', array(
    'title'          => __( 'Custom JS','beautify_pro' ),
    'description'    => __( 'Custom JS', 'beautify_pro'),
    'panel'          => 'general_panel', // Not typically needed.
) );
 Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'custom_js',
    'label'    => __( 'Custom Javascript: Quickly add some Javascript to your theme by adding it to this block.  Validate that it\'s javascript!', 'beautify_pro' ),
    'section'  => 'custom_js_section',
    'type'     => 'code',  
    'choices'     => array(
        'language' => 'javascript',  
        'theme'    => 'monokai',
        'height'   => 250, 
    ), 
) ); 


// Tracking section 

Beautify_Kirki::add_section( 'analytics_section', array(
    'title'          => __( 'Tracking Code','beautify_pro' ),
    'description'    => __( 'Tracking Code', 'beautify_pro'),
    'panel'          => 'general_panel', // Not typically needed.
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'analytics',
    'label'    => __( 'Tracking Code :Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme. Validate that it\'s javascript!', 'beautify_pro' ),
    'section'  => 'analytics_section',
    'type'     => 'code',  
    'choices'     => array(
        'language' => 'javascript',  
        'theme'    => 'monokai',
        'height'   => 250, 
    ), 
    'tooltip' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme. <b>Validate that it\'s javascript!</b>','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'analytics_place',
    'label'    => __( 'Enable to Load Tracking Code in Footer', 'beautify_pro' ),
    'section'  => 'analytics_section',
    'type'     => 'switch',
    'choices' => array(
        '1'  => esc_attr__( 'Enable', 'beautify_pro' ),
        '2' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => '2',
    'tooltip' => __('Check to load analytics in footer. Uncheck to load in header.','beautify_pro'),
) );


//  lightbox section //

Beautify_Kirki::add_section( 'light_box', array(
    'title'          => __( 'Light Box','beautify_pro' ),
    'description'    => __( 'Light Box Settings', 'beautify_pro'),
    'panel'          => 'general_panel', // Not typically needed.
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'lightbox_theme',
    'label'    => __( 'Lightbox Theme', 'beautify_pro' ),
    'section'  => 'light_box',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        '1' => esc_attr__( 'pp_default', 'beautify_pro' ),
        '2' => esc_attr__( 'light-rounded', 'beautify_pro' ),
        '3' => esc_attr__( 'dark-rounded', 'beautify_pro' ),
        '4' => esc_attr__( 'light-square', 'beautify_pro' ),
        '5' => esc_attr__( 'dark-square', 'beautify_pro' ),
        '6' => esc_attr__( 'facebook', 'beautify_pro' ),
    ),
    'default'  => '1',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'lightbox_animation_speed',
    'label'    => __( 'Animation Speed', 'beautify_pro' ),
    'section'  => 'light_box',
    'type'     => 'select',
    'multiple'    => 1,
    'choices'     => array(
        'fast' => esc_attr__( 'Fast', 'beautify_pro' ),
        'slow' => esc_attr__( 'Slow', 'beautify_pro' ),
        'normal' => esc_attr__( 'Normal', 'beautify_pro' ),
    ),
    'default'  => 'fast',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'lightbox_slideshow',
    'label'    => __( 'Autoplay Gallery Speed', 'beautify_pro' ),
    'section'  => 'light_box',
    'type'     => 'number',
    'choices'     => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 10,
    ),
    'default'  => 50,
    'tooltip' => __('If autoplay is set to true, select the slideshow speed in ms. (Default: 5000, 1000 ms = 1 second)','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'lightbox_autoplay_slideshow',
    'label'    => __( 'Enable Autoplay Gallery', 'beautify_pro' ),
    'section'  => 'light_box',
    'type'     => 'switch',
    'choices' => array(
        '1'  => esc_attr__( 'Enable', 'beautify_pro' ),
        '2' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => '2',
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'lightbox_opacity',
    'label'    => __( 'Select Background Opacity', 'beautify_pro' ),
    'section'  => 'light_box',
    'type'     => 'number',
    'choices'     => array(
        'min'  => 0,
        'max'  => 1,
        'step' => 0.1,
    ),
    'default'  => 0.5,
    'tooltip' => __('Enter 0.1 to 1.0','beautify_pro'),
) );
Beautify_Kirki::add_field( 'beautify_pro', array(
    'settings' => 'lightbox_overlay_gallery',
    'label'    => __( 'Show Gallery Thumbnails', 'beautify_pro' ),
    'section'  => 'light_box',
    'type'     => 'switch',
    'choices' => array( 
        '1'  => esc_attr__( 'Enable', 'beautify_pro' ),
        '2' => esc_attr__( 'Disable', 'beautify_pro' )
    ),
    'default'  => '1',
) );


 

         
do_action('beautify_pro_child_customizer_options');
