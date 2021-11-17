<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Project extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        // 'partials.page-header',
        'partials.project-sidebar',
        'partials.content-single-project',
        'partials.project-header',
        'partials.project-siblings',
    ];

    public function with() {
        return [
           "projects" => $this->projects(),        
           "resources" => $this->resources(),
           "posts" => $this->posts(),
           "parent" => $this->parent()
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

    public function parent() {
        global $post;
            if (!$post->post_parent || get_post_status($post->post_parent) == 'private') return null;

            $parent = new \stdClass;
            $parent->title = get_the_title($post->post_parent);
            $parent->permalink = get_permalink($post->post_parent);
            return $parent;
    }

    public function resources() {
        return get_field('resources') ? array_slice(get_field('resources'),0, 6) : null;
    }

    public function posts() {
        return get_posts([
            'post_type'        => 'post',
            'numberposts' => 3,
            'meta_query' => [
                [
                    'key' => 'related_project',
                    'value' => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
                ]
            ]
        ]);
    }

    public function projects() {
        return get_posts([
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_type' => 'project',
            'numberposts' => -1,
            'post_parent' => 0
        ]);
    }
}