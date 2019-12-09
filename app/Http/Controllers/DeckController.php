<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CardController;

class DeckController extends Controller
{

    public $cards_on_deck = [];
    public $cards_on_table = [];
    public $drafted_cards = [];

    public function __construct()
    {
        $this->cards_on_deck = $this->shuffleCards();
    }

    public function drawCard()
    {
        return array_shift($this->cards_on_deck);
    }

    public function discardCard()
    {

    }

    public function shuffleCards()
    {
        $cards = new CardController();
        $card_list = $cards->getAllCards();
        shuffle($card_list);
        return $card_list;
    }

}
