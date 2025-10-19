<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function crb_attach_theme_options()
{
    Container::make('theme_options', 'Social Links')
        ->set_page_file('comintel-business-settings')
        ->add_fields(array(
            // Field::make('separator', 'section_social', 'Social Media'),
            Field::make('complex', 'social_media_links', 'Social Media Links')
                ->add_fields(array(
                    Field::make('text', 'cr-fa_icon_name', 'Font awesome Icon Name')
                        ->set_width(20)
                        ->set_help_text('Example: fa-facebook'),
                    Field::make('text', 'cr-url_link', 'URL Link')
                        ->set_width(80)
                        ->set_help_text('Example: https://www.facebook.com/comintel.tamarangpratama')
                        ->set_attribute('type', 'url')
                ))
        ));

    Container::make('theme_options', __('Contact Informations'))
        ->set_page_file('contact-informations')
        ->set_page_parent('comintel-business-settings') // reference to a top level container
        ->add_fields(array(
            Field::make('text', 'cr-com_phone_number', __('Phone Number'))
                ->set_attribute('type', 'tel'),
            Field::make('text', 'cr-com_mail', __('Email'))
                ->set_attribute('type', 'email'),
            Field::make('textarea', 'cr-com_address', __('Address')),
            Field::make('text', 'cr-com_lat', __('Latitude'))
                ->set_width(50)
                ->set_attribute('type', 'number'),
            Field::make('text', 'cr-com_long', __('Longitude'))
                ->set_width(50)
                ->set_attribute('type', 'number'),
            Field::make('text', 'cr-com_work_hours', __('Working Hours')),
        ));
}

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');


add_action('admin_menu', function () {
    global $menu;
    $filteredMenu = array_filter($menu, function ($item) {
        return in_array('comintel-business-settings', $item);
    });
    if (!empty($filteredMenu)) {
        $keys = array_keys($filteredMenu);
        if (isset($menu[$keys[0]][0])) {
            $menu[$keys[0]][0] = 'Comintel Site Settings';
        }
    }
}, 999);