<?php

namespace App\Console\Commands;

use App\Mail\TodoListMail;
use App\Mail\TodoListSumary;
use App\Models\TodoList as ModelsTodoList;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TodoList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todolist:notify {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '通知用戶todolist完成率 date=yyymmdd';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $argument = $this->argument('date');
        $date = (isset($argument)) ? Carbon::parse($argument) : Carbon::yesterday();
        $startAt = $date->startOfDay()->toDateTimeString();
        $endAt = $date->endOfDay()->toDateTimeString();
        $users = User::all('id', 'email');
        foreach ($users as $user) {
            //新增
            $todolist['today_created'] = ModelsTodoList::where([
                ['user_id', $user->id],
                ['created_at', '>=', $startAt],
                ['created_at', '<=', $endAt]
            ])->get('content');
            //完成
            $todolist['today_completed'] = ModelsTodoList::where([
                ['user_id', $user->id],
                ['completed_at', '>=', $startAt],
                ['completed_at', '<=', $endAt]
            ])->get('content');
            //剩餘
            $todolist['remaining'] = ModelsTodoList::where('user_id', $user->id)
                ->whereNull('completed_at')
                ->get('content');
            Mail::to($user->email)->queue(new TodoListMail($todolist, $date->format('Y-m-d')));
        }

        return Command::SUCCESS;
    }
}
