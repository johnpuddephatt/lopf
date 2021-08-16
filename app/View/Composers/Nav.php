<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Nav extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.site-header',
        'partials.site-footer'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        if($this->view->name() == 'partials.site-header') {
            return [
                'primaryNavigation' => $this->navigation('primary_navigation', [
                    'menu_class' => 'flex flex-col lg:flex-row'
                ], [
                    'level-0-link' => 'hover:border-blue',
                    'level-1-link' => 'text-lg'
                ]),
                'secondaryNavigation' => $this->navigation('secondary_navigation', [
                    'menu_class' => 'flex flex-col lg:flex-row'
                ]),
            ];
        }
        else {
            return [
                'primaryNavigationFooter' => $this->navigation('primary_navigation', [
                    'depth' => 1,
                    'menu_class' => 'flex flex-col'
                ], [
                    'level-0-link' => 'hover:border-sky'
                ]),
                'secondaryNavigationFooter' => $this->navigation('secondary_navigation', [
                    'depth' => 1,
                    'menu_class' => 'flex flex-col'
                ], [
                    'level-0-link' => 'hover:border-sky'
                ]),
                'tertiaryNavigation' => $this->navigation('tertiary_navigation', [
                    'depth' => 1,
                    'menu_class' => 'flex flex-col'
                ], [
                    'level-0-link' => 'hover:border-sky'
                ])
            ];
        }
    }

    public function navigation($name, $args = [], $styles = []) {
        if (has_nav_menu($name)) {
            return wp_nav_menu(array_merge([
                'theme_location' => $name,
                'walker' => new \App\Navwalker($styles),
                'menu_class' => 'nav flex',
                'echo' => false
            ], $args));
        }
    }
}
