<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller {
    public function index() {
        $data = User::all();

        return view( 'users.index', [ 'users' => $data ] );
    }

    public function create() {

        return view( 'users.create', );
    }
    public function edit($id) {
        // dd($id);
        try {
        $user = User::find($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view( 'users.edit',['user' => $user] );
    }

    public function store( UserRequest $request ) {
        if ( request()->has( 'avatar' ) ) {
            $avatar = request()->file( 'avatar' );
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path( '/images/' );
            $avatar->move( $avatarPath, $avatarName );
        }
        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make( $request->password ),
            'avatar' => '/images/' . $avatarName,
        ] );
        // $user = User::create( $request->all() );
        if ( $user ) {
            return    back()->with( 'success', 'Account Successful created' );
        } else {
            return  back()->with( 'Emessage', 'An Error Occured' ) ;
        }
    }
    public function update( UserRequest $request ) {
        if ( request()->has( 'avatar' ) ) {
            $avatar = request()->file( 'avatar' );
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path( '/images/' );
            $avatar->move( $avatarPath, $avatarName );
        }
        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make( $request->password ),
            'avatar' => '/images/' . $avatarName,
        ] );
        // $user = User::create( $request->all() );
        if ( $user ) {
            return    back()->with( 'success', 'Account Successful created' );
        } else {
            return  back()->with( 'Emessage', 'An Error Occured' ) ;
        }
    }
}
