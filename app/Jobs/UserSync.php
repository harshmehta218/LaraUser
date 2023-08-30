<?php

namespace App\Jobs;

use App\Models\UserData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserSync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userDataRequest)
    {
        $this->request = $userDataRequest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->request['contact_number']);
        $newUser = UserData::updateOrCreate([
            'email' => $this->request['email'],
        ],[
            'name' => $this->request['name'],
            'email' => $this->request['email'],
            'role' => $this->request['role'],
            'contact_number' => $this->request['contact_number'],
            'address' => $this->request['address'],
        ]);
        dd($newUser);
    }
}
