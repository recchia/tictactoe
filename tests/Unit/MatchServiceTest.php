<?php

namespace Tests\Unit;

use App\Match;
use App\Service\MatchService;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MatchServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test listing.
     *
     * @return void
     */
    public function testListing()
    {
        $service = new MatchService();
        $list = $service->create();

        $this->assertInstanceOf(Collection::class, $list);
        $this->assertEquals(1, count($list));

    }

    public function testCreate()
    {
        $service = new MatchService();
        $match = $service->create()->first();
        $match2 = $service->get($match->id);

        $this->assertEquals($match, $match2);
    }

    public function testDelete()
    {
        $service = new MatchService();

        $match = $service->create()->first();
        $list = $service->remove($match->id);

        $this->assertEquals(0, count($list));
    }

    public function testMove()
    {
        $service = new MatchService();
        $match = $service->create()->first();
        $matchUpdated = $service->update($match->id, 0, 1);

        $this->assertInstanceOf(Match::class, $matchUpdated);
        $this->assertEquals([1, 0, 0, 0, 0, 0, 0, 0, 0], $matchUpdated->board);

    }
}
