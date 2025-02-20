<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SpService\SpServiceInterface;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    public function index(SpServiceInterface $spService, Request $request)
    {
        $payload = $request->validate(['email' => 'required|email']);

        return response()->json($spService->spGetBrokerListing($payload['email']));
    }
}
