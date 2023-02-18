<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\User;
use App\Models\Task;
use App\Models\AcceptedTask;

use DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){

        $employee = Employee::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->rightJoin(DB::raw("(SELECT 1 as month_num, 'January' as month_name UNION SELECT 2 as month_num, 'February' as month_name UNION SELECT 3 as month_num, 'March' as month_name UNION SELECT 4 as month_num, 'April' as month_name UNION SELECT 5 as month_num, 'May' as month_name UNION SELECT 6 as month_num, 'June' as month_name UNION SELECT 7 as month_num, 'July' as month_name UNION SELECT 8 as month_num, 'August' as month_name UNION SELECT 9 as month_num, 'September' as month_name UNION SELECT 10 as month_num, 'October' as month_name UNION SELECT 11 as month_num, 'November' as month_name UNION SELECT 12 as month_num, 'December' as month_name) months"), function($join) {
            $join->on(DB::raw("MONTH(employees.created_at)"), '=', 'months.month_num');
        })
        ->groupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('count', 'month_name');
 
        $labels = $employee->keys();
        $data = $employee->values();

        return view('admin.index', compact('labels', 'data'), [
            'users' => User::all(),
            'clients' => Client::count(),
            'employees' => Employee::count(),
            'tasks' => Task::count(),
            'acceptedTasks' => AcceptedTask::where('status', '=', 'accepted')->count(),
            'male' => Employee::where('jenis_kelamin','=','pria')->count(),
            'female' => Employee::where('jenis_kelamin','=','wanita')->count(),
        ]);
    }
}
