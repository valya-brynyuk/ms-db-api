<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SpService\SpServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrokerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/broker",
     *     summary="Get list of brokers by email",
     *     tags={"Broker"},
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="Broker email",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="email"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="MatterNumber", type="integer", example=1),
     *                  @OA\Property(property="MatterDescription", type="string", example="Іван"),
     *                  @OA\Property(property="Client", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="MatterOpened", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="CaseType", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="TitleDeedsReceived", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="MortgageOfferReceived", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="MatterCompleted", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="MatterCancelled", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="CaseHandler", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="Progress", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="AddText1", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="AddText2", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="AddText3", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="AddDate1", type="string", example="ivan@example.com"),
     *                  @OA\Property(property="AddDate2", type="string", example="ivan@example.com"),
     *              )
     *          )
     *     )
     * )
     */
    public function index(SpServiceInterface $spService, Request $request)
    {
        $payload = $request->validate(['email' => 'required|email']);

        return response()->json($spService->spGetBrokerListing($payload['email']));
    }

    /**
     * @OA\Post(
     *     path="/api/v1/broker/check-user",
     *     summary="Check if user exists",
     *     tags={"Broker"},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"name","email"},
     *              @OA\Property(property="name", type="string", example="Evan"),
     *              @OA\Property(property="email", type="string", format="email", example="evan@example.com"),
     *              @OA\Property(property="password", type="string", format="password", example="12345678")
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="object",
     *         )
     *     )
     * )
     */
    public function checkUser(SpServiceInterface $spService, Request $request)
    {
        $payload = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $userExistsResponse = $spService->spGetCheckBrokerUser($payload['email'], $payload['password']);
        $userExists = $userExistsResponse[0]['UserExists'] ?? 0;
        if (!$userExists) {
            return response()->json([], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([

        ]);
    }
}
