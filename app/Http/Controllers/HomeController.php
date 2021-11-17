<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Notice $notice)
    {
        $notices = $notice->all();

        // seleciona somente as ntícias do usuário logado.
        // $notices = $notice->where('user_id', auth()->user()->id)->get();

        return view('home', compact('notices'));
    }

    public function update($id)
    {
        $notice = Notice::find($id);

        $this->authorize('notice-update', $notice);

        return view('notice-update', compact('notice'));
    }

    public function rolesPermissions()
    {
        $nameUser = auth()->user()->name;
        echo "<h1>$nameUser</h1>";
        foreach (auth()->user()->roles as $role) {
            echo "<b>$role->name:</b>";
            $permissions = $role->permissions;
            // dd($permissions);
            foreach ($permissions as $permission) {
                echo " $permission->name, ";
            }
            echo '<hr>';
        }
    }
}
