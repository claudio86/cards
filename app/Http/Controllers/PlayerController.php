<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public $number;
    public $name;
    public $cards;

    public function __construct()
    {
        $this->number = [];
        $this->name = [];
        $this->cards = [];
    }

    public function addPlayer($number)
    {
        $this->name = 'Player n: '.$number;
        $this->number = $number;
    }

}
