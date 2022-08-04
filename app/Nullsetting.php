<?php
namespace App;
use App\Models\Setting;


class NullSetting extends Setting
{
    protected $attributes = [
        'site_title' => 'Default site Title',
        'site_name' => 'Default site Name',
        'site_email' => 'default@gmail.com',
        'footer_text' => 'Default footer text',
        'sidebar_collapse' => false,
    ];
}