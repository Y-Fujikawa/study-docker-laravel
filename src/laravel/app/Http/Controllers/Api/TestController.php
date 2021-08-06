<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
    * @OA\Get(
    *   path="/test",
    *   summary="Swaggerのテスト用",
    *   @OA\Response(
    *     response=200,
    *     description="OK",
    *     @OA\JsonContent(
    *       type="object",
    *       @OA\Property(
    *         property="message",
    *         type="string",
    *         description="レスポンスパラメータの例を記載"
    *       )
    *     )
    *   ),
    *   @OA\Response(
    *     response=400,
    *     description="Bad Request",
    *     @OA\JsonContent(
    *       type="object",
    *       @OA\Property(
    *         property="message",
    *         type="string",
    *         description="レスポンスパラメータの例を記載"
    *       )
    *     )
    *   ),
    *   @OA\Response(
    *     response="default",
    *     description="Unexpected Error",
    *     @OA\JsonContent(
    *       type="object",
    *       @OA\Property(
    *         property="message",
    *         type="string",
    *         description="レスポンスパラメータの例を記載"
    *       )
    *     )
    *   )
    * )
    */
    public function index()
    {
        return response()->json([
            'message' => 'Hello API!!!',
        ]);
    }
}
