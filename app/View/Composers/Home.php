<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Home extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        // 'partials.page-header',
        // 'partials.content',
        'template-home',
    ];

    public function with() {

        return [
            "hero_title" => get_theme_mod('home_hero_title'),
            "hero_subtitle" => get_theme_mod('home_hero_subtitle'),
            "hero_image" => wp_get_attachment_image(get_theme_mod('home_hero_image'), 'square', false, [
               'class' => 'w-full clip-teardrop',
               'alt' => get_theme_mod('home_hero_image_alt'),
               'sizes' => '(orientation: portrait) 100vw, 50vw'
            ]),

            "announcement_title" => get_theme_mod('home_announcement_title'),
            "announcement_text" => get_theme_mod('home_announcement_text'),
            "announcement_link" => get_theme_mod('home_announcement_link'),
            "announcement_linktext" => get_theme_mod('home_announcement_linktext'),
            "announcement_enabled" => get_theme_mod('home_announcement_enabled'),

            "groups_title" => get_theme_mod('home_groups_title'),
            "groups_description" => get_theme_mod('home_groups_description'),
            "groups_enabled" => get_theme_mod('home_groups_enabled'),

            "blocks_enabled" => get_theme_mod('home_blocks_enabled'),
            "blocks" => get_posts([
            'post_type' => 'any',
            'orderby' => 'post__in',
            'numberposts' => '4',
            'include' => array_reduce(
                get_option('home_blocks')['blocks'],
                    function( $result, $item ) {
                        $result[] = intval($item['item']);
                        return $result;
                    }
                )
            ]),

            "research_title" => get_theme_mod('home_research_title'),
            "research_description" => get_theme_mod('home_research_description'),
            "research_enabled" => get_theme_mod('home_research_enabled'),

            "join_pretitle" => get_theme_mod('home_join_pretitle'),
            "join_title" => get_theme_mod('home_join_title'),
            "join_enabled" => get_theme_mod('home_join_enabled'),
            "join_image" => wp_get_attachment_image(get_theme_mod('home_join_image'), 'twothirds', false, [
                'alt' => 'Photo of older person playing sport in wheelchair',
               'class' => 'w-full rounded',
               'sizes' => '(orientation: portrait) 100vw, 30vw'
            ]),

            "posts" => get_posts([
                'post_type' => 'post',
                'numberposts' => 4
            ]),

            "signup_title" => get_theme_mod('home_signup_title'),
            "signup_buttontext" => get_theme_mod('home_signup_buttontext'),
            "signup_enabled" => get_theme_mod('home_signup_enabled'),
        ];
    }

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            //    "foo" => 'bar',
        ];
    }
}