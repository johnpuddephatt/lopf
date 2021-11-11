<?php

/**
 * Theme admin.
 */

namespace App;

use WP_Customize_Manager;

use function Roots\asset;

/**
 * Register the `.brand` selector to the blogname.
 *
 * @param  \WP_Customize_Manager $wp_customize
 * @return void
 */
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);

    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'custom_css' );
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    /*
    ** Home
    */

    $wp_customize->add_panel( 'home_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Homepage',
        'description'    => 'Settings relating to the homepage',
    ));

    // Home hero 

    $wp_customize->add_section(
      'home_hero',
      array(
          'title' => 'Hero',
          'description' => '',
          'priority' => 15,
          'panel'=>'home_panel',
        )
    );

    $wp_customize->add_setting(
        'home_hero_image'
    );

    $wp_customize->add_control(
        new \WP_Customize_Media_Control(
          $wp_customize,
          'home_hero_image',
          array(
            'label' => 'Image',
            'section' => 'home_hero',
            'settings' => 'home_hero_image',
            'transport' => 'postMessage'
          )
        )
    );

    $wp_customize->add_setting(
        'home_hero_title',
        array(          
          'sanitize_callback' => 'sanitize_textarea_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
    'home_hero_title',
    array(
      'type' => 'textarea',
      'label' => 'Title',
      'section' => 'home_hero',
      'settings' => 'home_hero_title',
      'input_attrs' => array(
        'maxlength' => 60
    )
    )
    );
    
    $wp_customize->selective_refresh->add_partial('home_hero_title', [
      'selector' => '.home-hero-title',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('home_hero_title');
      }
    ]);
    

    $wp_customize->add_setting(
        'home_hero_subtitle',
        array(          
          'sanitize_callback' => 'sanitize_text_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
    'home_hero_subtitle',
    array(
      'type' => 'textarea',
      'label' => 'Subtitle',
      'section' => 'home_hero',
      'settings' => 'home_hero_subtitle',
    )
    );

    $wp_customize->selective_refresh->add_partial('home_hero_subtitle', [
      'selector' => '.home-hero-subtitle',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('home_hero_subtitle');
      }
    ]);


    /*
    ** Contact details
    */

    $wp_customize->add_section(
      'contact',
      array(
          'title' => 'Contact details',
          'description' => '',
          'priority' => 35,
      )
    );

    // Address
    $wp_customize->add_setting(
        'contact_address',
        array(
          'default' => 'Josephs Well, Hanover Walk, Leeds LS3 1AB',
          'sanitize_callback' => 'sanitize_textarea_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->selective_refresh->add_partial('contact_address', [
      'selector' => '.contact-address',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('contact_address');
      }
    ]);

    $wp_customize->get_setting('contact_address')->transport = 'postMessage';

    $wp_customize->add_control(
    'contact_address',
    array(
      'type' => 'textarea',
      'label' => 'Address',
      'section' => 'contact',
      'settings' => 'contact_address',
    )
    );

    // Phone
    $wp_customize->add_setting(
        'contact_phone',
        array(
          'default' => '00441132441697',
          'sanitize_callback' => 'sanitize_text_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
    'contact_phone',
    array(
      'type' => 'text',
      'label' => 'Phone (machine readable)',
      'section' => 'contact',
      'settings' => 'contact_phone',
    )
    );

    // Phone (human readable)
    $wp_customize->add_setting(
        'contact_phone_human',
        array(
          'default' => '0113 244 1697',
          'sanitize_callback' => 'sanitize_text_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->selective_refresh->add_partial('contact_phone_human', [
      'selector' => '.contact-phone',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('contact_phone_human');
      }
    ]);

    $wp_customize->get_setting('contact_phone_human')->transport = 'postMessage';

    $wp_customize->add_control(
    'contact_phone_human',
    array(
      'type' => 'text',
      'label' => 'Phone (human readable)',
      'section' => 'contact',
      'settings' => 'contact_phone_human',
    )
    );

    // Email
    $wp_customize->add_setting(
        'contact_email',
        array(
          'default' => 'info@opforum.org.uk',
          'sanitize_callback' => 'sanitize_text_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->selective_refresh->add_partial('contact_email', [
      'selector' => '.contact-email',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('contact_email');
      }
    ]);

    $wp_customize->get_setting('contact_email')->transport = 'postMessage';

    $wp_customize->add_control(
    'contact_email',
    array(
      'type' => 'text',
      'label' => 'Email',
      'section' => 'contact',
      'settings' => 'contact_email',
    )
    );

    // Facebook
    $wp_customize->add_setting(
        'facebook',
        array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->selective_refresh->add_partial('facebook', [
      'selector' => '.social-icon__facebook',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('facebook');
      }
    ]);

    $wp_customize->get_setting('facebook')->transport = 'postMessage';

    $wp_customize->add_control(
    'facebook',
    array(
      'type' => 'text',
      'label' => 'Facebook',
      'section' => 'contact',
      'settings' => 'facebook',
    )
    );


    // Twitter
    $wp_customize->add_setting(
        'twitter',
        array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->selective_refresh->add_partial('twitter', [
      'selector' => '.social-icon__twitter',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('twitter');
      }
    ]);

    $wp_customize->get_setting('twitter')->transport = 'postMessage';

    $wp_customize->add_control(
    'twitter',
    array(
      'type' => 'text',
      'label' => 'Twitter',
      'section' => 'contact',
      'settings' => 'twitter',
    )
    );

    // YouTube
    $wp_customize->add_setting(
        'youtube',
        array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->selective_refresh->add_partial('youtube', [
      'selector' => '.social-icon__youtube',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('youtube');
      }
    ]);

    $wp_customize->get_setting('youtube')->transport = 'postMessage';

    $wp_customize->add_control(
    'youtube',
    array(
      'type' => 'text',
      'label' => 'YouTube',
      'section' => 'contact',
      'settings' => 'youtube',
    )
    );

    // Instagram
    $wp_customize->add_setting(
        'instagram',
        array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->selective_refresh->add_partial('instagram', [
      'selector' => '.social-icon__instagram',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('instagram');
      }
    ]);

    $wp_customize->get_setting('instagram')->transport = 'postMessage';

    $wp_customize->add_control(
    'instagram',
    array(
      'type' => 'text',
      'label' => 'Instagram',
      'section' => 'contact',
      'settings' => 'instagram',
    )
    );


    // Linkedin
    $wp_customize->add_setting(
        'linkedin',
        array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->selective_refresh->add_partial('linkedin', [
      'selector' => '.social-icon__linkedin',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('linkedin');
      }
    ]);

    $wp_customize->get_setting('linkedin')->transport = 'postMessage';

    $wp_customize->add_control(
    'linkedin',
    array(
      'type' => 'text',
      'label' => 'Linkedin',
      'section' => 'contact',
      'settings' => 'linkedin',
    )
    );



    /*
    ** Company info
    */

    $wp_customize->add_section(
      'company',
      array(
          'title' => 'Company info',
          'description' => '',
          'priority' => 40,
      )
    );

    // Address
    $wp_customize->add_setting(
        'company_info',
        array(
          'default' => 'Migrants’ Rights Network Ltd. is a registered company in England and Wales (#06024396) and a registered charity (#1125746).', 
          'sanitize_callback' => 'sanitize_textarea_field',
          'transport' => 'postMessage'
        )
    );

    $wp_customize->selective_refresh->add_partial('company_info', [
      'selector' => '.company-info',
      'container_inclusive' => false,
      'fallback_refresh' => false,
      'render_callback' => function() {
          echo get_theme_mod('company_info');
      }
    ]);

    // Company info
    $wp_customize->get_setting('company_info')->transport = 'postMessage';

    $wp_customize->add_control(
    'company_info',
    array(
      'type' => 'textarea',
      'label' => 'Company info',
      'section' => 'company',
      'settings' => 'company_info',
    )
    );

    // Home announcement 

    $wp_customize->add_section(
      'home_announcement',
      array(
          'title' => 'Announcement',
          'description' => 'A simple announcement. Let people know what’s happening – a new job vacancy, an award won etc.',
          'priority' => 25,
          'panel'=>'home_panel',
        )
    );

    $wp_customize->add_setting(
        'home_announcement_enabled'
    );

    $wp_customize->add_control(
    'home_announcement_enabled',
    array(
      'type' => 'checkbox',
      'label' => 'Enabled',
      'section' => 'home_announcement',
      'settings' => 'home_announcement_enabled',
    )
    );


    $wp_customize->add_setting(
        'home_announcement_title',
      array(
        'transport' => 'refresh',
        'default' => 'Announcement'
      )
    );

    $wp_customize->add_control(
    'home_announcement_title',
    array(
      'type' => 'text',
      'label' => 'Title',
      'section' => 'home_announcement',
      'settings' => 'home_announcement_title',
    )
    );

    $wp_customize->add_setting(
        'home_announcement_text'
    );

    $wp_customize->add_control(
    'home_announcement_text',
    array(
      'type' => 'textarea',
      'label' => 'Description',
      'section' => 'home_announcement',
      'settings' => 'home_announcement_text',
    )
    );

    $wp_customize->add_setting(
      'home_announcement_link'
    );

    $wp_customize->add_control(
    'home_announcement_link',
    array(
      'type' => 'text',
      'label' => 'Link (URL)',
      'section' => 'home_announcement',
      'settings' => 'home_announcement_link',
    )
    );

    $wp_customize->add_setting(
      'home_announcement_linktext',
      array(
        'transport' => 'refresh',
        'default' => 'Read more'
      )
    );

    $wp_customize->add_control(
    'home_announcement_linktext',
    array(
      'type' => 'text',
      'label' => 'Link text',
      'section' => 'home_announcement',
      'settings' => 'home_announcement_linktext',
    )
    );


     // Home 'groups' section 

    $wp_customize->add_section(
      'home_groups',
      array(
          'title' => 'Groups',
          'description' => '',
          'priority' => 25,
          'panel'=>'home_panel',
        )
    );

       $wp_customize->add_setting(
        'home_groups_enabled'
    );

    $wp_customize->add_control(
    'home_groups_enabled',
    array(
      'type' => 'checkbox',
      'label' => 'Enabled',
      'section' => 'home_groups',
      'settings' => 'home_groups_enabled',
    )
    );

    $wp_customize->add_setting(
        'home_groups_title'
    );

    $wp_customize->add_control(
    'home_groups_title',
    array(
      'type' => 'text',
      'label' => 'Title',
      'section' => 'home_groups',
      'settings' => 'home_groups_title',
    )
    );

    $wp_customize->add_setting(
        'home_groups_description',
      array(
        'transport' => 'refresh',
        'default' => 'Discover local community groups across Leeds'
      )
    );

    $wp_customize->add_control(
    'home_groups_description',
    array(
      'type' => 'textarea',
      'label' => 'Description',
      'section' => 'home_groups',
      'settings' => 'home_groups_description',
    )
    );

        $wp_customize->add_setting(
      'home_groups_link'
    );

    $wp_customize->add_control(
    'home_groups_link',
    array(
      'type' => 'text',
      'label' => 'Link (URL)',
      'section' => 'home_groups',
      'settings' => 'home_groups_link',
    )
    );

    $wp_customize->add_setting(
      'home_groups_linktext',
      array(
        'transport' => 'refresh',
        'default' => 'Read more'
      )
    );

    $wp_customize->add_control(
    'home_groupst_linktext',
    array(
      'type' => 'text',
      'label' => 'Link text',
      'section' => 'home_groups',
      'settings' => 'home_groups_linktext',
    )
    );




    // Home 'blocks' section 

    $wp_customize->add_setting(
      'home_blocks_enabled'
    );

    $wp_customize->add_control(
    'home_blocks_enabled',
    array(
      'type' => 'checkbox',
      'label' => 'Enabled',
      'section' => 'home_blocks',
      'settings' => 'home_blocks_enabled',
    )
    );

    $wp_customize->add_section(
      'home_blocks',
      array(
          'title' => 'Configurable blocks',
          'description' => '',
          'priority' => 25,
          'panel'=>'home_panel',
        )
    );

    // Home 'blog' section 

    $wp_customize->add_section(
      'home_blog',
      array(
          'title' => 'Blog',
          'description' => '',
          'priority' => 25,
          'panel'=>'home_panel',
        )
    );

    $wp_customize->add_setting(
      'home_blog_enabled'
    );

    $wp_customize->add_control(
    'home_blog_enabled',
    array(
      'type' => 'checkbox',
      'label' => 'Enabled',
      'section' => 'home_blog',
      'settings' => 'home_blog_enabled',
    )
    );

            // Home 'research' section 

    $wp_customize->add_section(
      'home_research',
      array(
          'title' => 'Resources',
          'description' => '',
          'priority' => 25,
          'panel'=>'home_panel',
        )
    );

           $wp_customize->add_setting(
        'home_research_enabled'
    );

    $wp_customize->add_control(
    'home_research_enabled',
    array(
      'type' => 'checkbox',
      'label' => 'Enabled',
      'section' => 'home_research',
      'settings' => 'home_research_enabled',
    )
    );

    $wp_customize->add_setting(
        'home_research_title'
    );

    $wp_customize->add_control(
    'home_research_title',
    array(
      'type' => 'text',
      'label' => 'Title',
      'section' => 'home_research',
      'settings' => 'home_research_title',
    )
    );

    $wp_customize->add_setting(
        'home_research_description'
    );

    $wp_customize->add_control(
    'home_research_description',
    array(
      'type' => 'textarea',
      'label' => 'Description',
      'section' => 'home_research',
      'settings' => 'home_research_description',
    )
    );



        // Home 'join' section 

    $wp_customize->add_section(
      'home_join',
      array(
          'title' => 'Join us',
          'description' => '',
          'priority' => 25,
          'panel'=>'home_panel',
        )
    );

    $wp_customize->add_setting(
      'home_join_enabled'
    );

    $wp_customize->add_control(
    'home_join_enabled',
    array(
      'type' => 'checkbox',
      'label' => 'Enabled',
      'section' => 'home_join',
      'settings' => 'home_join_enabled',
    )
    );

    $wp_customize->add_setting(
        'home_join_image'
    );

    $wp_customize->add_control(
        new \WP_Customize_Media_Control(
          $wp_customize,
          'home_join_image',
          array(
            'label' => 'Image',
            'section' => 'home_join',
            'settings' => 'home_join_image',
            'transport' => 'postMessage'
          )
        )
    );

    $wp_customize->add_setting(
        'home_join_pretitle'
    );

    $wp_customize->add_control(
    'home_join_pretitle',
    array(
      'type' => 'text',
      'label' => 'Pre-title',
      'section' => 'home_join',
      'settings' => 'home_join_pretitle',
    )
    );

    $wp_customize->add_setting(
        'home_join_title'
    );

    $wp_customize->add_control(
    'home_join_title',
    array(
      'type' => 'textarea',
      'label' => 'Title',
      'section' => 'home_join',
      'settings' => 'home_join_title',
    )
    );

    // Home 'newsletter' section 

    $wp_customize->add_section(
      'home_signup',
      array(
          'title' => 'Newsletter signup',
          'description' => '',
          'priority' => 25,
          'panel'=>'home_panel',
        )
    );

    $wp_customize->add_setting(
      'home_signup_enabled'
    );

    $wp_customize->add_control(
    'home_signup_enabled',
    array(
      'type' => 'checkbox',
      'label' => 'Enabled',
      'section' => 'home_signup',
      'settings' => 'home_signup_enabled',
    )
    );

    $wp_customize->add_setting(
        'home_signup_title'
    );

    $wp_customize->add_control(
    'home_signup_title',
    array(
      'type' => 'textarea',
      'label' => 'Title',
      'section' => 'home_signup',
      'settings' => 'home_signup_title',
    )
    );

    $wp_customize->add_setting(
        'home_signup_buttontext'
    );

    $wp_customize->add_control(
    'home_signup_buttontext',
    array(
      'type' => 'text',
      'label' => 'Button text',
      'section' => 'home_signup',
      'settings' => 'home_signup_buttontext',
    )
    );









});

/**
 * Register the customizer assets.
 *
 * @return void
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset('scripts/customizer.js')->uri(), ['customize-preview'], null, true);
});

if(class_exists('\Kirki')) {

\Kirki::add_config( 'theme_config_id', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'option',
	'option_name' => 'home_blocks'
) );

$projects = array_reduce(
            get_posts( 'post_type=project&posts_per_page=-1' ),
            function( $result, $item ) {
                $result[$item->ID] = $item->post_title;
                return $result;
            }
        );

$pages = array_reduce(
            get_posts( 'post_type=page&posts_per_page=-1' ),
            function( $result, $item ) {
                $result[$item->ID] = $item->post_title;
                return $result;
            }
        );




  \Kirki::add_field( 'theme_config_id', [
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Repeater Control', 'kirki' ),
    'section'     => 'home_blocks',
    'priority'    => 10,
    'row_label' => [
      'type'  => 'field',
      'value' => 'page',
      'field' => 'item',
    ],
    'settings'    => 'blocks',
    'fields' => [
      'item' => [
        'type'        => 'select',
        'default'     => $pages ? array_key_first($pages) : null,
        'choices' => ($pages + $projects)
      ]
    ],
    'choices' => [
      'limit' => 4
    ],
  ] );

}