<?php

namespace App\Services\SpService;

use Illuminate\Support\Facades\DB;

class SpService implements SpServiceInterface
{
    public function spGetClientTransactionDetailsbyEmail(string $email) {
        return DB::select('exec spGetClientTransactionDetailsByEmail @email=?', [$email]);
    }

    public function spGetBrokerListing(string $email) {
        return DB::select('exec spGetBrokerListing @email=?', [$email]);
    }

    public function spGetMattersDetailsWNWeb(string $matterId) {
        return DB::select('exec spGetMattersDetailsWNWeb @MatterID=?', [$matterId]);
    }

    public function spGetMatterDetailsWNWeb(string $matterId) {
        return DB::select('exec spGetMatterDetailsWNWeb @MatterID=?', [$matterId]);
    }

    public function spGetMatterHistoryWNWeb(string $matterId) {
        return DB::select('exec spGetMatterHistoryWNWeb @MatterID=?', [$matterId]);
    }

    public function spGetMatterMilestoneDatesWNWeb(string $matterId) {
        return DB::select('exec spGetMatterMilestoneDatesWNWeb @MatterID=?', [$matterId]);
    }

    public function spGetCheckBrokerUser(string $email,string $password) {
        return DB::select('exec spCheckBrokerUserWNWeb @UserEmail=?, @UserP=?', [$email, $password]);
    }
}
