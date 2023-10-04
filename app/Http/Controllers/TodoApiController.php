<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Carbon\Carbon;

class TodoApiController extends Controller
{
    public function get($context, $date_complite = null)
    {
        if (!isset($date_complite) || $date_complite == null) {
            $date_complite = Carbon::today();
        }
        if (!is_numeric(strtotime($date_complite))) {
            return toJson('error valid date');
        }

        $todo = Todo::new();
        $todo->context = $context;
        $todo->date_complite = $date_complite;
        $todo->save();

        return toJson('complite');
    }
}
