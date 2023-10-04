<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function todo()
    {
        $counter = 0;
        if (isset($_GET['day'])) {
            $day = $_GET['day'];
            $counter++;
        }
        if (isset($_GET['month']) && $counter > 0) {
            $month = $_GET['month'];
            $counter++;
        }
        if (isset($_GET['year']) && $counter > 1) {
            $year = $_GET['year'];
            $counter++;
        }    
        if ( $counter == 3 ) {
            $date = new Carbon($year . '-' . $month . '-' . $day);
        } else {
            $date = Carbon::today();
        }    
        $nextDate = new Carbon($date->addDay());
        $date->subDay();
        $nextDate = '?day=' . $nextDate->format('d') . '&month=' . $nextDate->format('m') . '&year=' . $nextDate->format('Y');                
        $beforeDate = new Carbon($date->subDay());
        $date->addDay();
        $beforeDate = '?day=' . $beforeDate->format('d') . '&month=' . $beforeDate->format('m') . '&year=' . $beforeDate->format('Y');        

        $todoList = Todo::where('date_complite', '=', $date)->get();        
        
        $date = $date->toFormattedDateString();
        return view('todo.todo', compact('date', 'todoList', 'nextDate', 'beforeDate'));
    }
}
