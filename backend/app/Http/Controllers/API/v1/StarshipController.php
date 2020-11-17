<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Repositories\StarshipRepository;

use App\Http\Requests\CreateStarship;
use App\Http\Requests\UpdateStarship;

use App\Models\Starship;

class StarshipController extends Controller
{   

    /**
     * @OA\Post(
     * path="/api/v1/starships",
     * summary="Create Starship",
     * description="Create Starship",
     * operationId="starshipCreate",
     * tags={"Starships"},
     * @OA\RequestBody(
     *    description="Starship object",
     *    @OA\JsonContent(
     *       required={"name", "crew", "model", "image"},
     *       @OA\Property(property="name", type="string", format="string", example="Death Star"),
     *       @OA\Property(property="crew", type="integer", format="integer", example="434"),
     *       @OA\Property(property="model", type="string", format="string", example="DS24"),
     *       @OA\Property(property="image", type="string", format="string", example="https://loremflickr.com/g/300/300/starship"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="The given data was invalid",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="The given data was invalid."),
     *       @OA\Property(property="errors", type="object", @OA\Items(type="string"))
     *     )
     *    )
     * )
     */
    public function create(CreateStarship $request, StarshipRepository $repository) {
        return $repository->create($request->validated());
    }

    /**
     * @OA\Get(
     * path="/api/v1/starships/{starship}",
     * summary="Get Starship",
     * description="Get Starship",
     * operationId="getStarship",
     * tags={"Starships"},
     * @OA\Parameter(name="starship",in="path",description="Starship ID",required=true),
     * @OA\Response(
     *    response=401,
     *    description="Unauthorized.",
     *    )
     * )
     */
    public function get(Request $request, Starship $starship, StarshipRepository $repository) {
        return $repository->get($starship);
    }

    /**
     * @OA\Put(
     * path="/api/v1/starships/{starship}",
     * summary="Update Starship",
     * description="Update Starship",
     * operationId="updateStarship",
     * tags={"Starships"},
     * @OA\Parameter(name="starship",in="path",description="Starship ID",required=true),
     * @OA\RequestBody(
     *    description="Starship object",
     *    @OA\JsonContent(
     *       @OA\Property(property="name", type="string", format="string", example="Death Star"),
     *       @OA\Property(property="crew", type="integer", format="integer", example="434"),
     *       @OA\Property(property="model", type="string", format="string", example="DS24"),
     *       @OA\Property(property="image", type="string", format="string", example="https://loremflickr.com/g/300/300/starship"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="The given data was invalid",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="The given data was invalid."),
     *       @OA\Property(property="errors", type="object", @OA\Items(type="string"))
     *     )
     *    )
     * )
     */
    public function update(UpdateStarship $request, Starship $starship, StarshipRepository $repository) {
        return $repository->update($request->validated(), $starship);
    }

    /**
     * @OA\Delete(
     * path="/api/v1/starships/{starship}",
     * summary="Delete Starship",
     * description="Delete Starship",
     * operationId="deleteStarship",
     * tags={"Starships"},
     * @OA\Parameter(name="starship",in="path",description="Starship ID",required=true),
     * @OA\Response(
     *    response=422,
     *    description="The given data was invalid",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="The given data was invalid."),
     *       @OA\Property(property="errors", type="object", @OA\Items(type="string"))
     *     )
     *    )
     * )
     */
    public function delete(Request $request, Starship $starship, StarshipRepository $repository) {
        return $repository->delete($starship);
    }

    /**
     * @OA\Get(
     * path="/api/v1/starships",
     * summary="Get All Starships with Pagination",
     * description="Get Starship",
     * operationId="getStarships",
     * tags={"Starships"},
     * @OA\Parameter(name="page",in="query",description="Page Number"),
     * @OA\Response(
     *    response=401,
     *    description="Unauthorized.",
     *    )
     * )
     */
    public function all(Request $request, StarshipRepository $repository) {
        return $repository->all();
    }

    /**
     * @OA\Get(
     * path="/api/v1/starships/play",
     * summary="Play Starship",
     * description="Play Starship",
     * operationId="playStarship",
     * tags={"Starships"},
     * @OA\Response(
     *    response=401,
     *    description="Unauthorized.",
     *    )
     * )
     */
    public function play(Request $request, StarshipRepository $repository) {
        return $repository->play();
    }
    

}
