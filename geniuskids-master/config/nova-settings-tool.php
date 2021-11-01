<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Settings Path
    |--------------------------------------------------------------------------
    |
    | Path to the JSON file where settings are stored.
    |
    */

    'path' => storage_path('app/settings.json'),

    /*
    |--------------------------------------------------------------------------
    | Sidebar Label
    |--------------------------------------------------------------------------
    |
    | The text that Nova displays for this tool in the navigation sidebar.
    |
    */

    'sidebar-label' => 'Settings',

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    | The good stuff :). Each setting defined here will render a field in the
    | tool. The only required key is `key`, other available keys include `type`,
    | `label`, `help`, `placeholder`, `language`, and `panel`.
    |
    */

    'settings' => [
        [
            'key' => 'address',
            'label' => 'Address',
            'type' => 'text',
            'Panel' => 'Contact Us'
        ],
        [
            'key' => 'call_link',
            'label' => 'Call Us',
            'type' => 'text',
            'Panel' => 'Contact Us'
        ],
        [
            'key' => 'email_link',
            'label' => 'Email Us',
            'type' => 'text',
            'Panel' => 'Contact Us'
        ],
        [
            'key' => 'whatsapp_link',
            'label' => 'WhatsApp Number',
            'type' => 'text',
            'Panel' => 'Contact Us'
        ],
        [
          'key' => 'facebook_link',
          'label' => 'Facebook Page Link',
          'type' => 'text',
          'Panel' => 'Social Media Links'
        ],
        [
            'key' => 'instagram_link',
            'label' => 'Instagram Page Link',
            'type' => 'text',
            'Panel' => 'Social Media Links'
        ],
        [
            'key' => 'youtube_link',
            'label' => 'YouTube Channel Link',
            'type' => 'text',
            'Panel' => 'Social Media Links'
        ],
        [
            'key' => 'twitter_link',
            'label' => 'Twitter Channel Link',
            'type' => 'text',
            'Panel' => 'Social Media Links'
        ],
        [
            'key' => 'snapchat_link',
            'label' => 'Snapchat Channel Link',
            'type' => 'text',
            'Panel' => 'Social Media Links'
        ],
        [
            'key' => 'vat',
            'label' => 'Value Added Tax',
            'type' => 'number',
            'panel' => 'Payment'
        ],
        [
            'key' => 'siblings_discount',
            'label' => 'Siblings Discount',
            'type' => 'number',
            'panel' => 'Payment'
        ],
        [
            'key' => 'beneficiary_name',
            'label' => 'Beneficiary Name',
            'type' => 'text',
            'panel' => 'Bank Information'
        ],
        [
            'key' => 'bank_name',
            'label' => 'Bank Name',
            'type' => 'text',
            'panel' => 'Bank Information'
        ],
        [
            'key' => 'account_number',
            'label' => 'Account Number',
            'type' => 'text',
            'panel' => 'Bank Information'
        ],
        [
            'key' => 'iban_number',
            'label' => 'IBAN Number',
            'type' => 'text',
            'panel' => 'Bank Information'
        ],
        [
            'key' => 'swift_code',
            'label' => 'Swift Code',
            'type' => 'text',
            'panel' => 'Bank Information'
        ],
        [
            'key' => 'api_endpoint',
            'label' => 'API End Point',
            'type' => 'text',
            'panel' => 'Payment Gateway'
        ],
        [
            'key' => 'customer',
            'label' => 'Customer Name',
            'type' => 'text',
            'panel' => 'Payment Gateway'
        ],
        [
            'key' => 'username',
            'label' => 'Username',
            'type' => 'text',
            'panel' => 'Payment Gateway'
        ],
        [
            'key' => 'password',
            'label' => 'Password',
            'type' => 'text',
            'panel' => 'Payment Gateway'
        ],
    ],

];
