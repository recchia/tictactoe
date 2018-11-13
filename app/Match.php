<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    /** @var array  */
    private const LINES = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6],
    ];

    protected $casts = [
        'board' => 'array',
    ];

    public function calculateWinner(): void {
        for ($i = 0; $i < count(self::LINES); $i++) {
            [$a, $b, $c] = self::LINES[$i];

            if ($this->board[$a] && $this->board[$a] === $this->board[$b] && $this->board[$a] === $this->board[$c]) {
                $this->winner = $this->board[$a];
            }
        }

    }
}
