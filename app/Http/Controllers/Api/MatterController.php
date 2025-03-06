<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SpService\SpServiceInterface;
use Illuminate\Http\Request;

class MatterController extends Controller
{
    public function matterDetails(SpServiceInterface $spService, string $matterId)
    {
        return response()->json($spService->spGetMattersDetailsWNWeb($matterId));
    }

    public function matterHistory(SpServiceInterface $spService, string $matterId)
    {
        return response()->json($spService->spGetMatterHistoryWNWeb($matterId));
    }

    public function milestoneDates(SpServiceInterface $spService, string $matterId)
    {
        return response()->json($spService->spGetMatterMilestoneDatesWNWeb($matterId));
    }
}
