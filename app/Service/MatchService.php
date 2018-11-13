<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 23/10/18
 * Time: 21:10
 */

namespace App\Service;


use App\Match;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class MatchService
{
    public function __construct() {}

    /**
     * Return all Matches
     *
     * @return Collection
     */
    public function getAll(): Collection {
        return Match::all();
    }

    /**
     * Create a new Match
     *
     * @return Collection
     */
    public function create(): Collection {
        $match = new Match();
        $match->name = 'Match' . $this->getNextId();
        $match->next = 1;
        $match->winner = 0;
        $match->board = [
            0, 0, 0,
            0, 0, 0,
            0, 0, 0
        ];

        $match->save();

        return $this->getAll();
    }

    /**
     * Get a specific Match
     *
     * @param int $id
     * @return Match
     */
    public function get(int $id): Match {
        $match = Match::find($id);

        return $match;
    }

    /**
     * Make a move
     *
     * @param int $id
     * @param int $position
     * @param int $player
     * @return Match
     */
    public function update(int $id, int $position, int $player): Match {
        $match = Match::find($id);
        $board = $match->board;
        $board[$position] = $player;
        $match->board = $board;
        $match->calculateWinner();
        $match->next = $player === 1 ? 2 : 1;
        $match->save();

        return $match;

    }

    /**
     * Delete Match
     *
     * @param int $id
     * @return Collection
     * @throws \Exception
     */
    public function remove(int $id): Collection {
        $match = Match::find($id);

        if ($match instanceof Match) {
            $match->delete();
        }

        return $this->getAll();
    }

    /**
     * Calculate next id
     *
     * @return int
     */
    private function getNextId() : int {
        $match = Match::find(DB::table('matches')->max('id'));

        if (!$match instanceof Match) {
            return 1;
        }

        return $match->id + 1;
    }

}