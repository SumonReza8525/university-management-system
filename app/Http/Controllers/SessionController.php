<?php
namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $sessions      = Session::all();
        $totalSessions = $sessions->count();

        // return $sessions;
        return view( 'allSessions', compact( 'sessions', 'totalSessions' ) );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'createSession' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $request->validate( [
            'session' => [
                'required',
                'string',
                'regex:/^\d{4}-\d{4}$/',
                'unique:sessions,session',
            ],
        ] );

        $session = Session::create( [
            'session' => $request->session,
        ] );

        return redirect()
            ->route( 'session.index' )
            ->with( 'success', 'Session created successfully!' );
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {
        $session = Session::findOrFail( $id );
        $session->delete();
        return redirect()->route( 'session.index' )
            ->with( 'success', 'Session deleted successfully!' );
    }
}
