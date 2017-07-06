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
        for ($i=0; $i < count($input); $i++) {
            $output[$i] = $input[$i]->name;
        }

        return $output;
    }

    public function makeFullPrettyArray($input)
    {
        for ($i=0; $i < count($input); $i++) {
            $output[$i] = $input[$i];
        }

        return $output;
    }
}
