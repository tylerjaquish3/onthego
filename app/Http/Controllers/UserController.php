<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Input;
use DateTime;
use DateTimeZone;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        $usersView = view('users.sections.users');
        $usersTab = [
            'active' => 'true',
            'id' => 'users',
            'title' => 'Users',
            'content' => $usersView->render(),
        ];

        $tabs = [$usersTab];

        return view('users.index', ['tabs' => $tabs]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $rolesColleciton = Role::all();
        $roles = [];

        foreach ($rolesColleciton as $currentRole) {
            $roles[$currentRole->name] = $currentRole->name;
        }

        return view('users.edit', array('user' => $user, 'roles' => $roles));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $user = User::find(Auth::user()->id);
        
        if ($user->role_id == User::ADMIN_ROLE_ID) {
            $user = User::find($id);
            $user->negative_margin_email = isset($request['negative_margin_email']);
            $user->error_email = isset($request['error_email']);
            $user->trending_products_email = isset($request['trending_products_email']);
            $user->role_id = $request['role_id'];
            $user->save();

            $alert = 'alert-success';
            $title = 'Success';
            $message = 'User updated';

        } else {
            $alert = 'alert-error';
            $title = 'Error';
            $message = 'You don\'t have permisisons to edit roles.';
        }

        return redirect()
            ->route('users.index')
            ->with($alert, [
                'title' => $title,
                'message' => $message,
                'timeout' => '5',
            ]);
    }

    /**
     * @return mixed
     */
    public function getUserData()
    {
        $users = User::with('role')->get();
        // dd($users);

        return DataTables::of($users)
            ->editColumn('name', function ($user) {
                return '<a href="/users/' . $user->id . '/edit">' . $user->name . '</a>';
            })
            ->editColumn('users.updated_at', function ($user) {
                $date = new DateTime($user->updated_at);
                $date->setTimezone(new DateTimeZone('America/Los_Angeles'));
                return $date->format('m.d.Y H:i:s');
            })
            ->rawColumns(['name'])
            ->setRowId('id')
            ->make(true);
    }

    /**
     * @param Request $request
     */
    public function updateIsActive(Request $request)
    {
        $user = User::find($request->userId);

        ($user && $user->is_active) ?
            $user->update(['is_active' => 0]) :
            $user->update(['is_active' => 1]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getRoles()
    {
        $roles = Role::all();
        return DataTables::of($roles)->make(true);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function getRoleLabels(Request $request)
    {
        $roles = Role::where('label', 'LIKE', '%'.$request->term.'%')->get();
        $labels = $roles->pluck('label')->toArray();

        return $labels;
    }
}
