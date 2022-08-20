<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use Illuminate\Routing\UrlGenerator;

class UserController extends Controller {
    public function index() {
        if ( Auth()->user()->usertype == 'Super' || Auth()->user()->usertype == 'Admin' ) {
            $data = User::all();
            return view( 'users.index', [ 'users' => $data ] );
        } else {
            return view( 'apps-contacts-profile' );
        }
    }

    public function viewUser( $id ) {
        $data = User::find( $id );
        // dd($data);
        return view( 'contact-profile', [ 'users' => $data ] );
    }

    public function create() {

        return view( 'users.create', );
    }

    public function edit( $id ) {
        // dd( $id );
        try {
            $user = User::find( $id );
        } catch ( ModelNotFoundException $exception ) {
            return back()->withError( $exception->getMessage() )->withInput();
        }
        return view( 'users.edit', [ 'user' => $user ] );
    }

    public function store( UserRequest $request ) {
        if ( request()->has( 'avatar' ) ) {
            $avatar = request()->file( 'avatar' );
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path( '/uploads/profile/images/' );
            $avatar->move( $avatarPath, $avatarName );
        }
        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make( $request->password ),
            'avatar' =>url( '/' ).'/uploads/profile/images/'. $avatarName,
        ] );

        // $user = User::create( $request->all() );

        if ( $user ) {
            return redirect()->route( 'view.user' )->with( 'success', 'Account Profile' );
        } else {
            return back()->with( 'Emessage', 'An Error Occured' ) ;
        }
    }

    public function update( UserRequest $request ) {
        if ( request()->has( 'avatar' ) ) {
            $avatar = request()->file( 'avatar' );
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path( '/uploads/profile/images/' );
            $avatar->move( $avatarPath, $avatarName );
        }
        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make( $request->password ),
            'avatar' => url( '/' ).'/uploads/profile/images/' . $avatarName,
        ] );
        // $user = User::create( $request->all() );
        if ( $user ) {
            return    back()->with( 'success', 'Account Successful created' );
        } else {
            return  back()->with( 'Emessage', 'An Error Occured' ) ;
        }
    }
}
