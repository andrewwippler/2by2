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
        $output = [];
        for ($i=0; $i < count($input); $i++)
        {
            $pos = $input[$i]->position ?? 0;
            if (array_key_exists($pos, $output))
            {
                $old = $output[$pos];
                $output[$pos] = $input[$i]->name;
                $output[] = $old;
            }
            else
            {
                $output[$pos] = $input[$i]->name;
            }
        }

        ksort($output);

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
