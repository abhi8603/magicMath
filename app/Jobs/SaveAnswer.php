<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SaveAnswer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $where;
    protected $value;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($where,$value)
    {
         $this->where=$where;
         $this->value=$value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         DB::table('questions')->where($this->where)->update(["user_answer" => $this->value]);
    }
}
