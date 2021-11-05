<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Member extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        // 'partials.page-header',
        'partials.member-header',
        // 'partials.content-*',
    ];

    public function with() {
        return [
            'contact_details' => $this->contact_details(),
            'neighbourhood_network' => get_field('neighbourhood_network'),
            'area_covered' => get_field('area_covered')
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

    public function contact_details() {
        $contact = new \stdClass();
        $contact->phone = get_field('phone');
        $contact->email = get_field('email');
        $contact->facebook = get_field('facebook');
        $contact->twitter = get_field('twitter');
        $contact->website = get_field('website');
        $contact->address = get_field('address') ? get_field('address')['address'] : null;
        return $contact;
    }
}
