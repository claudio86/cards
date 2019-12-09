<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public $seeds;
    public $numbers;

    public function __construct()
    {
        $this->seeds = [
            'bastoni',
            'spade',
            'denari',
            'coppe'
        ];

        $this->numbers = [
            1,2,3,4,5,6,7,8,9,10
        ];
    }

    public function getAllCards()
    {
        $cards = [];
        foreach ($this->seeds as $seed)
        {
            foreach ($this->numbers as $number)
            {
                $cards[][$seed] = $number;
            }
        }
        return $cards;
    }

    public function getCard($card)
    {
        return $card;
    }

}
