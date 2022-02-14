<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function users(){
        $total_user = User::where('role_id', 2)->count();
        $banned_user = User::where('role_id', 2)->where('status', 0)->count();
        $active_user = User::where('role_id', 2)->where('status', 1)->count();
        $users = User::where('role_id', 2)->paginate(20);
        return view('admin.report.users', compact('users','total_user','banned_user','active_user'));
    }

    public function userSearch(Request $request){
        $from   = $request->from . " 00:00:00";
        $to     = $request->to . " 23:59:59";
        if ($request->from == '' &&  $request->to == '') {
            $users = User::where('role_id', 2)->paginate(10);
            $total_user = User::where('role_id', 2)->count();
            $banned_user = User::where('role_id', 2)->where('status', 0)->count();
            $active_user = User::where('role_id', 2)->where('status', 1)->count();

        }elseif ($request->from == '' && $request->to != '') {
            $total_user = User::where('created_at','<', $request->to)->where('role_id', 2)->count();
            $banned_user = User::where('created_at','<', $request->to)->where('role_id', 2)->where('status', 0)->count();
            $active_user = User::where('created_at','<', $request->to)->where('role_id', 2)->where('status', 1)->count();
            $users = User::where('created_at','<', $request->to)->where('role_id', 2)->paginate(10);
        }elseif ($request->from != '' && $request->to == '') {
            $total_user = User::where('created_at','>', $request->from)->where('role_id', 2)->count();
            $banned_user = User::where('created_at','>', $request->from)->where('role_id', 2)->where('status', 0)->count();
            $active_user = User::where('created_at','>', $request->from)->where('role_id', 2)->where('status', 1)->count();
            $users = User::where('created_at','>', $request->from)->where('role_id', 2)->paginate(10);
        }else{
            $total_user = User::whereBetween('created_at', [$from, $to])->where('role_id', 2)->count();
            $banned_user = User::whereBetween('created_at', [$from, $to])->where('role_id', 2)->where('status', 0)->count();
            $active_user = User::whereBetween('created_at', [$from, $to])->where('role_id', 2)->where('status', 1)->count();
            $users = User::whereBetween('created_at', [$from, $to])->where('role_id', 2)->paginate(10);
        }
        return view('admin.report.users', compact('users','total_user','banned_user','active_user'));
    }

    public function transactions(){
        
    }
}
