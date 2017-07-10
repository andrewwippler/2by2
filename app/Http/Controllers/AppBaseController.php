<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AppBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
