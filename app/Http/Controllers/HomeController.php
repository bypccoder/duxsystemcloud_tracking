<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware([
            'role:Admin|Backoffice|Post-Venta',
            'permission:admin.dashboard.index|home|admin.form_postsale.index',

        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        if ($user->hasRole('Admin')) {
            return redirect()->route('admin.dashboard.index');
        } elseif ($user->hasRole('Backoffice')) {
            return redirect()->route('admin.dashboard.index');
        } elseif ($user->hasRole('Post-Venta')) {
            return redirect()->route('admin.form_postsale.index');
        }

    }

    public function show()
    {
        return view('admin.dashboard.index');
    }
}
