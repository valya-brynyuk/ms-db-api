<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SpService\SpServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrokerController extends Controller
{
    public function index(SpServiceInterface $spService, Request $request)
    {
        $payload = $request->validate(['email' => 'required|email']);

        return response()->json($spService->spGetBrokerListing($payload['email']));
    }

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
