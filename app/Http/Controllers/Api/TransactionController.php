<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SpService\SpServiceInterface;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/transaction/details",
     *     summary="Get transactions by email",
     *     tags={"Transaction"},
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="Email",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="email",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="PortalID", type="string", example="10726"),
     *                  @OA\Property(property="UsernameEmail", type="string", example="iancreightoncr@gmail.com"),
     *                  @OA\Property(property="ClientName", type="string", example="Adele Summers"),
     *                  @OA\Property(property="TransactionType", type="string", example="Purchase"),
     *                  @OA\Property(property="PropertyValue", type="string", example="5000000"),
     *                  @OA\Property(property="BaseFee", type="string", example="27480"),
     *                  @OA\Property(property="TotalFee", type="string", example="542170"),
     *                  @OA\Property(property="QuoteGeneratedDate", type="string", example="2025-03-27"),
     *                  @OA\Property(property="InstructedFlag", type="string", example="0"),
     *                  @OA\Property(property="InstructedDate", type="string", example="null"),
     *                  @OA\Property(property="InstructedMatterNum", type="string", example=""),
     *                  @OA\Property(property="QuoteID", type="string", example="2498"),
     *                  @OA\Property(property="CompletedDate", type="string", example="null"),
     *                  @OA\Property(property="CancelledDate", type="string", example="null"),
     *                  @OA\Property(property="AddText1", type="string", example=""),
     *                  @OA\Property(property="AddText2", type="string", example=""),
     *                  @OA\Property(property="AddText3", type="string", example=""),
     *                  @OA\Property(property="AddDate1", type="string", example=""),
     *                  @OA\Property(property="AddDate2", type="string", example=""),
     *              )
     *          )
     *     )
     * )
     */
    public function clientTransactionDetails(SpServiceInterface $spService, Request $request)
    {
        $payload = $request->validate(['email' => 'required|email']);

        return response()->json($spService->spGetClientTransactionDetailsbyEmail($payload['email']));
    }
}
