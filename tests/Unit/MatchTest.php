<?php

namespace Tests\Unit;

use App\Match;
use Tests\TestCase;

class MatchTest extends TestCase
{
    /**
     * Test calculate winner.
     *
     * @return void
     */
    public function testCalculateWinner()
    {
        $match = new Match();
        $match->board = [
            1, 1, 1,
            0, 0, 0,
            0, 0, 0,
        ];

        $match->calculateWinner();
        $this->assertInstanceOf(Match::class, $match);
        $this->assertEquals(1, $match->winner);
    }
}
