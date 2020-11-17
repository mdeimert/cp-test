<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Starship;
use App\Http\Resources\Starship as StarshipResource;

class StarshipRepository
{

    public function all() {
        return StarshipResource::collection(Starship::orderBy('created_at', 'DESC')->paginate(10));
    }
    
    public function create($data)
    {
        return DB::transaction(function () use($data) {
            $starship = Starship::create($data);
            return new StarshipResource($starship);
        });
    }

    public function get($starship)
    {
        return new StarshipResource($starship);
    }

    public function update($data, $starship)
    {
        return DB::transaction(function () use($data, $starship) {
            $starship->update($data);
            $starship = $starship->fresh();
            return new StarshipResource($starship);
        });
    }

    public function delete($starship)
    {
        return DB::transaction(function () use($starship) {
            $starship->delete();
            return [
                'status' => true
            ];
        });
    }

    public function play()
    {
        $starship1 = Starship::inRandomOrder()->first();
        $starship2 = Starship::where('id', '!=', $starship1->id)->inRandomOrder()->first();
        if($starship1->crew >= $starship2->crew) {
            if($starship1->crew == $starship2->crew) $winner = 'DRAW';
            $winner = 'starship1';
        } else {
            $winner = 'starship2';
        }

        return [
            'starship1' => new StarshipResource($starship1),
            'starship2' => new StarshipResource($starship2),
            'winner' => $winner
        ];
    }

}
