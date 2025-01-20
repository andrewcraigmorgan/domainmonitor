<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Domain;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\DomainDownNotification;

class CheckDomainUptime extends Command
{
    protected $signature = 'check:domain-uptime';
    protected $description = 'Check the uptime of all monitored domains';

    public function handle()
    {
        $domains = Domain::all();

        foreach ($domains as $domain) {
            try {
                $response = Http::timeout(10)->get($domain->url);
                $domain->is_up = $response->status() === 200;
            } catch (\Exception $e) {
                $domain->is_up = false;
            }

            $domain->save();

            if (!$domain->is_up) {
                Mail::to($domain->user->email)->send(new DomainDownNotification($domain));
            }
        }

        $this->info('Domain uptime checked successfully.');
    }
}
