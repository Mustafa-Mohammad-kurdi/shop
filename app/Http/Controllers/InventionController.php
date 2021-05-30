<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventionRequest;
use App\Models\Invention;
use Illuminate\Http\Request;

class InventionController extends Controller
{
    /**
     * @OA\GET(
     * path="/api/Invention",
     * summary="Get all Invention",
     * description="",
     *
     * tags={"Invention"},
     * security={ {"sanctum": {} }},
     * @OA\RequestBody(

     * ),
     * @OA\Response(
     *    response=200,
     *    description="",
     *  @OA\JsonContent()
     *
     *     )
     * )
     */

    public function index()
    {
        return $this->sendList(
            'items',
            Invention::all(),
        );
    }

    /**
     * @OA\POST(
     * path="/api/Invention",
     * summary="create a Invention",
     * description="",
     *
     * tags={"Invention"},
     *
     * @OA\RequestBody(
     * @OA\JsonContent(
     *       @OA\Property(property="code", example="code"),
     *      @OA\Property(property="isAvailable", example=true),
     *      @OA\Property(property="due_date", example=null),
     *     @OA\Property(property="from_user_id", example=1),
     *     @OA\Property(property="to_user_id", example=2),
     *
     *
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="",
     *  @OA\JsonContent()
     *
     *     )
     * )
     */
    public function store(InventionRequest $request)
    {

        $params = $request->validated();
        try {
            $obj = Invention::create( $params);
            return $this->created($obj);

        } catch (\Exception $e) {
            return $this->catchError($e->getMessage() );
        }

    }

    /**
     * @OA\PUT(
     * path="/api/Invention/{id}",
     * summary="update Invention",
     * description="",

     * tags={"Invention"},
     *  * @OA\Parameter(
     *    description="id of Invention",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example=1,
     *    @OA\Schema(
     *       type="integer",
     *
     *    )
     * ),
     * @OA\RequestBody(
     * @OA\JsonContent(
     *       @OA\Property(property="code", example="code"),
     *      @OA\Property(property="isAvailable", example=true),
     *      @OA\Property(property="due_date", example=null),
     *     @OA\Property(property="from_user_id", example=1),
     *     @OA\Property(property="to_user_id", example=2),
     *
     *
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="",
     *  @OA\JsonContent()
     *
     *     )
     * )
     */

    public function update(InventionRequest $request, $id)
    {
        $params = $request->validated();

        try {
            $obj = Invention::find( $id);
            if($obj == null)
                return $this->notFoundError( );
            $obj->update( $params);
            return $this->updated($obj);

        } catch (\Exception $e) {
            return $this->catchError($e->getMessage() );
        }
    }

    /**
     * @OA\DELETE(
     * path="/api/Invention/{id}",
     * summary="delete Invention",
     * description="",

     * tags={"Invention"},
     *  * @OA\Parameter(
     *    description="id of Invention",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example=1,
     *    @OA\Schema(
     *       type="integer",
     *
     *    )
     * ),

     * @OA\Response(
     *    response=200,
     *    description="",
     *  @OA\JsonContent()
     *
     *     )
     * )
     */

    public function destroy( $id)
    {
        try {
            $obj = Invention::find( $id);

            if($obj == null)
                return $this->notFoundError();

            $obj->delete();
            return $this->deleted();

        }
        catch (\Exception $e) {
            if(str_contains (  $e->getMessage() ,  'Cannot delete or update a parent row' ))
                return $this->sendError($this->getMessage('Record is already in use by another records') );

            return $this->catchError($e->getMessage() );
        }
    }

}
