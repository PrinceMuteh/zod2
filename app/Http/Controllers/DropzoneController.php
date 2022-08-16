<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropzoneController extends Controller {
    public function dropzone() {

        return view( 'dropzone' );
    }

    public function dropzoneStore( Request $request ) {
        $type = $request->type;
        $image = $request->file( 'file' );
        $imagename = time(). '.' . $image->extension();
        $image->move( public_path( 'images/' ), $imagename );
        $sql = DB::table( 'image' )->insert( [
            'users_id' => Auth()->user()->id,
            'type' => $type,
            'url' =>  url( '' ).'/'.'images/'.$imagename,
            'date' => now(),
            'created_at' => now()
        ] );
        return response()->json( [ 'success'=> $imagename ] );
    }

    public function dropzoneUpdate( Request $request ) {
        $image = $request->file( 'file' );
        $imagename = time(). '.' . $image->extension();
        $image->move( public_path( 'images/' ), $imagename );
        if ( $request->type == 'Category' ) {
            $sql = DB::table( 'category' )
            ->where( 'id', $request->id )
            ->update( [
                'categoryImage' =>  url( '' ).'/'.'images/'.$imagename,
                'update_at' => now()
            ] );
        }
        return response()->json( [ 'success'=> $imagename ] );
    }
}
