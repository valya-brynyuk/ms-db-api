<?php

namespace App\Services\SpService;

interface SpServiceInterface
{
    public function spGetClientTransactionDetailsbyEmail(string $email);

    public function spGetBrokerListing(string $email);

    public function spGetMattersDetailsWNWeb(string $matterId);

    public function spGetMatterHistoryWNWeb(string $matterId);

    public function spGetMatterMilestoneDatesWNWeb(string $matterId);
}
