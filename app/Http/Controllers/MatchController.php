<?php

namespace App\Http\Controllers;

use App\Service\MatchService;
use Illuminate\Support\Facades\Input;

class MatchController extends Controller {

    public function index() {
        return view('index');
    }

    /**
     * Returns a list of matches
     *
     * TODO it's mocked, make this work :)
     *
     * @param MatchService $match
     * @return \Illuminate\Http\JsonResponse
     */
    public function matches(MatchService $match) {
        return response()->json($match->getAll());
    }

    /**
     * Returns the state of a single match
     *
     * TODO it's mocked, make this work :)
     *
     * @param $id
     * @param MatchService $match
     * @return \Illuminate\Http\JsonResponse
     */
    public function match($id, MatchService $match) {
        return response()->json($match->get($id));
    }

    /**
     * Makes a move in a match
     *
     * TODO it's mocked, make this work :)
     *
     * @param $id
     * @param MatchService $match
     * @return \Illuminate\Http\JsonResponse
     */
    public function move($id, MatchService $match) {
        return response()->json($match->update($id, Input::get('position'), Input::get('player')));
    }

    /**
     * Creates a new match and returns the new list of matches
     *
     * TODO it's mocked, make this work :)
     *
     * @param MatchService $match
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(MatchService $match) {
        return response()->json($match->create());
    }

    /**
     * Deletes the match and returns the new list of matches
     *
     * TODO it's mocked, make this work :)
     *
     * @param $id
     * @param MatchService $match
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete($id, MatchService $match) {
        return response()->json($match->remove($id));
    }

}