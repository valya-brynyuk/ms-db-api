<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SpService\SpServiceInterface;
use Illuminate\Http\Request;

class MatterController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/matter/{matterId}",
     *     summary="Get details by matter ID",
     *     tags={"Matter"},
     *     @OA\Parameter(
     *         name="matterId",
     *         in="path",
     *         description="Matter ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="MatterNumber", type="string", example="331491"),
     *                  @OA\Property(property="MatterDesc", type="string", example="Purchase of 22 PR AZURE TEST, Bangor"),
     *                  @OA\Property(property="MatterOpenedDate", type="string", example="2017-09-21"),
     *                  @OA\Property(property="CaseHandler", type="string", example="ASUMMERS"),
     *              )
     *          )
     *     )
     * )
     */
    public function matterDetails(SpServiceInterface $spService, string $matterId)
    {
        return response()->json($spService->spGetMattersDetailsWNWeb($matterId));
    }

    /**
     * @OA\Get(
     *     path="/api/v1/matter/{matterId}/single",
     *     summary="Get single matter by Id",
     *     tags={"Matter"},
     *     @OA\Parameter(
     *         name="matterId",
     *         in="path",
     *         description="Matter ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="MatterNumber", type="string", example="331491"),
     *                  @OA\Property(property="MatterDesc", type="string", example="Purchase of 22 PR AZURE TEST, Bangor"),
     *                  @OA\Property(property="MatterOpenedDate", type="string", example="2017-09-21"),
     *                  @OA\Property(property="CaseHandler", type="string", example="ASUMMERS"),
     *                  @OA\Property(property="CaseHandlerName", type="string", example="Adele Summers"),
     *                  @OA\Property(property="CaseHandlerTel", type="string", example="028 9032 1234"),
     *                  @OA\Property(property="CaseHandlerPhotograph", type="string", example="aa...bb"),
     *                  @OA\Property(property="CaseHandlerEmail", type="string", example="ASummers@wilson-nesbitt.co.uk"),
     *                  @OA\Property(property="Client", type="string", example="Mr Alex Bittles and Mrs Jane Bloggs"),
     *                  @OA\Property(property="Progress", type="string", example="80.0"),
     *              )
     *          )
     *     )
     * )
     */
    public function singleDetails(SpServiceInterface $spService, string $matterId)
    {
        return response()->json($spService->spGetMatterDetailsWNWeb($matterId));
    }

    /**
     * @OA\Get(
     *     path="/api/v1/matter/{matterId}/history",
     *     summary="Get matter history by Id",
     *     tags={"Matter"},
     *     @OA\Parameter(
     *         name="matterId",
     *         in="path",
     *         description="Matter ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="HistoryDate", type="string", example="2024-10-24 15:18:48.000"),
     *                  @OA\Property(property="HistoryDesc", type="string", example="File in BOX Reference: BAN-2024-CON-111"),
     *                  @OA\Property(property="HistoryNotes", type="string", example=""),
     *                  @OA\Property(property="HistoryCategory", type="string", example=""),
     *                  @OA\Property(property="HistoryID", type="string", example="21779964"),
     *              )
     *          )
     *     )
     * )
     */
    public function matterHistory(SpServiceInterface $spService, string $matterId)
    {
        return response()->json($spService->spGetMatterHistoryWNWeb($matterId));
    }

    /**
     * @OA\Get(
     *     path="/api/v1/matter/{matterId}/milestone-dates",
     *     summary="Get matter milestones dates by Id",
     *     tags={"Matter"},
     *     @OA\Parameter(
     *         name="matterId",
     *         in="path",
     *         description="Matter ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="Milestone", type="string", example="Instructions Confirmed by Client"),
     *                  @OA\Property(property="CompletedDate", type="string", example="2022-08-08"),
     *              )
     *          )
     *     )
     * )
     */
    public function milestoneDates(SpServiceInterface $spService, string $matterId)
    {
        return response()->json($spService->spGetMatterMilestoneDatesWNWeb($matterId));
    }
}
