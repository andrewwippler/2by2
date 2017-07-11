<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AppBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $colors = [
        'gray',
        'black',
        'red',
        'maroon',
        'orange',
        'yellow',
        'green',
        'teal',
        'light-blue',
        'aqua',
        'navy',
        'purple',
    ];

    public $icons = [
        ['name' => 'visit', 'icon' => 'fa-map-marker', 'unicode' => '&#xf041;'],
        ['name' => 'call', 'icon' => 'fa-phone', 'unicode' => '&#xf095;'],
        ['name' => 'text', 'icon' => 'fa-comments-o', 'unicode' => '&#xf0e6;'],
        ['name' => 'email', 'icon' => 'fa-envelope-o', 'unicode' => '&#xf003;'],
        ['name' => 'letter', 'icon' => 'fa-file-text-o', 'unicode' => '&#xf0f6;'],
        ['name' => 'post card', 'icon' => 'fa-address-card-o', 'unicode' => '&#xf2bc;'],
        ['name' => 'other', 'icon' => 'fa-paperclip', 'unicode' => '&#xf0c6;'],
        ['name' => 'gift', 'icon' => 'fa-gift', 'unicode' => '&#xf06b;'],
        ['name' => 'user', 'icon' => 'fa-user', 'unicode' => '&#xf007;'],
        ['name' => 'people', 'icon' => 'fa-users', 'unicode' => '&#xf0c0;'],
        // ['name' => '', 'icon' => 'fa-', 'unicode' => '&#x;'],
    ];

    public function makePrettyArray($input)
    {
        // Create array by the position field
        $sortedArray = [];
        for ($i=0; $i < count($input); $i++)
        {
            $pos = $input[$i]->position ?? 0;
            if (array_key_exists($pos, $sortedArray))
            {
                $old = $sortedArray[$pos];
                $sortedArray[$pos] = ['id' => $input[$i]->id, 'name' => $input[$i]->name];
                array_unshift($sortedArray, $old);
            }
            else
            {
                $sortedArray[$pos] = ['id' => $input[$i]->id, 'name' => $input[$i]->name];
            }
        }

        ksort($sortedArray);

        // Reassemble array by ID for the forms to get the right data.
        foreach ($sortedArray as $key => $value) {
            $output[$value['id']] = $value['name'];
        }

        return $output;
    }

    public function makeFullPrettyArray($input)
    {
        for ($i=0; $i < count($input); $i++)
        {
            $output[$i] = $input[$i];
        }

        return $output;
    }
}
