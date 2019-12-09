<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\PlayerController;

class GameController extends Controller
{
    public $deck;
    public $players = [];

    public function startGame(Request $request)
    {
        if(empty($request->session()->get('game')->cards_on_deck) || (empty($request->session()->get('players'))))
        {
            $this->setDeck();
            $this->addPlayer();
            $this->addPlayer();

            $request->session()->put('game', $this->deck);
            $request->session()->put('players', $this->players);

        }else{
            $this->deck = $request->session()->get('game');
            $this->players = $request->session()->get('players');
            $this->dealCardsToPlayers();

        }

        return view(
            'game', [
                'name' => 'James',
//                'cards' => $this->deck->shuffleCards()
            ]
        );
    }

    public function setDeck()
    {
        $this->deck = new DeckController();
    }

    public function dealCardsToPlayers()
    {

        foreach ($this->players as $player)
        {
            for($n=1;$n<=3;$n++)
            {
                $player->cards[] = $this->deck->drawCard();
            }
//            $player->cards[] = $;
        }
        var_dump($this->players);
        var_dump($this->deck);
    }

    public function addPlayer()
    {
        $player_num = count($this->players) + 1;
        $players = new PlayerController();
        $players->addPlayer($player_num);

        $this->players[$player_num] = $players;

    }


}
