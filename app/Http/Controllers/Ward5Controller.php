<?php

namespace App\Http\Controllers;

use App\Beds;
use DateTime;
use App\BedManagement;
use Illuminate\Http\Request;

class Ward5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $beds = Beds::all();
        $beds = Beds::where('bed_number','LIKE','5%')->orderby('bed_number')->get();

        return view('ward5.w5',compact('beds','duration'));
    }
    
    public function edit($bed_number)
    {
        $beds = Beds::find($bed_number);

        $start_date = new DateTime($beds->move_date);
        $end_date = new DateTime($beds->est_dischr_date);
        
        return view('ward5.w5-edit',compact('beds','start_date','end_date'));
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

        return redirect('w5');
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
        $beds = Beds::where('bed_number','LIKE','N5%')->orWhere('bed_number','LIKE','S5%')->orderby('bed_number')->get();
        $temps = BedManagement::where('current_bed','LIKE','1')->orderBy('bed_number')->get();
        
        for ($i=0; $i <= count($beds)-1 ; $i++) { 
            for ($j=0; $j <= count($temps)-1 ; $j++) { 
                if ($beds[$i]['bed_number'] == $temps[$j]['bed_number']) {
                    $beds[$i]->status = 'Not Available'; 
                    $beds[$i]->move_date = $temps[$j]['move_date'];
                    $beds[$i]->move_time = $temps[$j]['move_time'];
                    $beds[$i]->employee_admit = $temps[$j]['modify_eid'];
                    $beds[$i]->save();break;
                }
                elseif ($beds[$i]['bed_number'] != $temps[$j]['bed_number']) {
                    if($beds[$i]->status == "Not Available"){
                        $beds[$i]->status = "Available";
                    }else{
                        if($beds[$i]->status == 'Prepare'){
                            $beds[$i]->status = 'Prepare';
                            $beds[$i]->est_dischr_date = NULL;
                            $beds[$i]->move_date = NULL;
                            $beds[$i]->move_time = NULL;
                            $beds[$i]->admit_duration = NULL;
                            $beds[$i]->employee_admit = NULL;
                        }
                        elseif($beds[$i]->status == 'Maintenance'){
                            $beds[$i]->status = 'Maintenance';
                            $beds[$i]->est_dischr_date = NULL;
                            $beds[$i]->move_date = NULL;
                            $beds[$i]->move_time = NULL;
                            $beds[$i]->admit_duration = NULL;
                            $beds[$i]->employee_admit = NULL;
                        }
                        elseif($beds[$i]->status == 'Available'){
                            $beds[$i]->status = 'Available';
                            $beds[$i]->est_dischr_date = NULL;
                            $beds[$i]->move_date = NULL;
                            $beds[$i]->move_time = NULL;
                            $beds[$i]->admit_duration = NULL;
                            $beds[$i]->employee_admit = NULL;
                        }
                    }
                }
            }
            $beds[$i]->save();
        }
        
        return view('ward5.w5',compact('beds'));
    }
}
