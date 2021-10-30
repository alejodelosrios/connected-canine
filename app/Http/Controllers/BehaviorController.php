<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BehaviorController extends Controller
{
    public function background()
    {
        return 'background';
    }

    public function separationConfinement()
    {
        return 'separationConfinement';
    }

    public function aggressionFear()
    {
        return 'aggressionFear';
    }
}
