<?php
/**
 * @SWG\Swagger(
 *     basePath="/api/v1",
 *     schemes={"http"}
 *     @SWG\Info(
 *         version="1.0.0"
 *     )
 * )
 */
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Elem",

 *      description="L5 Swagger OpenApi"
 * )
 * @OAS\SecurityScheme(
 *      securityScheme="sanctum",
 *      type="http",
 *      scheme="bearer"
 * )
 */
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function sendList( $key ,$items)
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'results' => [
                $key=>$items
            ]
        ], 200);
    }
    public function sendItem($message ,$item=null , $code = 200)
    {

        return response()->json([
            'success' => true,
            'message' => $message,
            'results' => $item
        ], $code);
    }
    public function sendError($message='',$error =null, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'error' => $error
        ], $code);
    }
    public function successfully()
    {
        return $this->sendItem($this->getMessage('Done successfully') );
    }
    public function created($object =null)
    {
        return $this->sendItem($this->getMessage('Created successfully') ,$object);
    }
    public function updated($object =null)
    {
        return $this->sendItem($this->getMessage('Updated successfully') ,$object);
    }
    public function deleted()
    {
        return $this->sendItem($this->getMessage('Deleted successfully') );
    }
    public function notFoundError()
    {
        return $this->sendError($this->getMessage('Not found'),null,404);
    }
    public function catchError($error)
    {
        return $this->sendError($this->getMessage('Catch Error'),$error,409);
    }
    public function validationError($error=null)
    {
        return $this->sendError($this->getMessage('Validation Error'),$error,400);
    }



    protected function getMessage($message , $lang='ar')
    {
        if(array_key_exists($message, $this->messages))
            return $this->messages[$message][$lang];
        else
            return $message;
    }

    public $messages = [
        'Done successfully' => [
            'ar' =>'???? ?????????????? ??????????',
            'en' =>'Done successfully'
        ],
        'Updated successfully' => [
            'ar' =>'???? ?????????????? ??????????',
            'en' =>'Updated successfully'
        ],
        'Created successfully'=>[
            'ar' =>'?????? ?????????????? ??????????',
            'en' =>'Created successfully'
        ],
        'Deleted successfully'=>[
            'ar' =>'???? ?????????? ??????????',
            'en' =>'Deleted successfully'
        ],
        'Not found'=>[
            'ar' =>'?????? ??????????',
            'en' =>'Not found'
        ],
        'Catch Error'=>[
            'ar' =>'?????? ?????? ?????? ??????????',
            'en' =>'Catch Error'
        ],
        'Validation Error'=>[
            'ar' =>'?????????????????? ?????????????? ?????? ??????????',
            'en' =>'Validation Error'
        ],
        'Error occurred while saving image'=>[
            'ar' =>'?????? ?????? ?????????? ?????????? ????????????',
            'en' =>'Error occurred while saving image'
        ],
        'already exists'=>[
            'en' =>'already exists',
            'ar' =>'?????????? ????????????'
        ],


    ];

}
