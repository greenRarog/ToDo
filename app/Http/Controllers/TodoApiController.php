<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Carbon\Carbon;

class TodoApiController extends Controller
{
    public function get($content, $date_complite = null)
    {
        if (!isset($date_complite) || $date_complite == null) {
            $date_complite = Carbon::today();
        }
        if (!is_numeric(strtotime($date_complite))) {
            return toJson('error valid date');
        }

        $todo = Todo::new();
        $todo->content = $content;
        $todo->date_complite = $date_complite;
        $todo->save();

        return toJson('complite');
    }
}
