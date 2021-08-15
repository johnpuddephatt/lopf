<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        // 'partials.page-header',
        'partials.content-single',
        // 'partials.content-*',
    ];

    public function with() {
        return [
            'projects' => $this->projects()
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
            // 'title' => $this->title(),
        ];
    }

    public function projects() {
        global $post;
        $project_ids = get_post_meta( $post->ID, 'project', true );
        if($project_ids) {
            return get_posts([
                'post_type'  =>   'project',
                'include'    =>    $project_ids
            ]);
        }
        else {
            return [];
        }
    }
}
