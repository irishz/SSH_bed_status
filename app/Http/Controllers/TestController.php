<?php

namespace App\Http\Controllers;

use App\Beds;
use Carbon\Carbon;
use App\BedManagement;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beds = Beds::where('bed_number','LIKE','S5%')->orderby('bed_number')->get();
        dd($beds);
        // $beds = Beds::where('bed_number','LIKE','2%')->orderby('bed_number')->get();
        

        // return view('test',compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bed_number)
    {
        $beds = Beds::find($bed_number);

        return view('bed.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bed_number)
    {
        $beds = Beds::find($bed_number);

        return view('bed.edit',compact('beds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bed_number)
    {
        $beds = Beds::find($bed_number);

        $beds->status = request('status');
        $beds->est_dischr_date = request('est_dischr_date');
        $beds->save();

        return redirect('/bed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetching(){
        $beds = Beds::where('bed_number','LIKE','2%')->orderby('bed_number')->get();
        $temps = BedManagement::where('current_bed','LIKE','1')->orderBy('bed_number')->get();

        for ($i=0; $i <= count($beds)-1 ; $i++) { 
            for ($j=0; $j <= count($temps)-1 ; $j++) { 
                if ($beds[$i]['bed_number'] == $temps[$j]['bed_number']) {
                    $beds[$i]->status = 'Not Available'; 
                    $beds[$i]->move_date = $temps[$j]['move_date'];
                    $beds[$i]->save();break;
                }
                elseif ($beds[$i]['bed_number'] != $temps[$j]['bed_number']) {
                    if($beds[$i]->status == 'Prepare'){
                        $beds[$i]->status = 'Prepare';
                    }
                elseif($beds[$i]->status == 'Maintenance'){
                        $beds[$i]->status = 'Maintenance';
                    }
                else{
                        $beds[$i]->status = 'Available';
                    }
                    $beds[$i]->move_date = null;
                    $beds[$i]->est_dischr_date = null;
                    $beds[$i]->save();
                }
            }
        }

        return view('bed.bed',compact('beds'));
    }
}