<?php

namespace App\Http\Controllers;

use App\Models\LocalGov;
use Illuminate\Http\Request;
use App\Models\PollingUnit;
use App\Models\PuResults;

class LocalGovController extends Controller
{

    private $local_gov_list; 

    public function __construct(){
        $this->local_gov_list = LocalGov::select('lga_id','lga_name')->where('lga_name', '!=', '')->get();
    }

    /**
     * Show all of the available local government
     *
     * @return Response
     */
    public function index()
    {
        return view('government', ['local_gov' => $this->local_gov_list]);
    }

    public function getLgaSum(Request $request){


        $lga_id =  $request->lga;

        // echo $lga_id;

        $lagUnit = LocalGov::where('lga_id', $lga_id)->first();

        // dd($lagUnit);
        
        $lagPollingUnitData = $lagUnit->pollingunit()->select('lga_id','polling_unit_id','polling_unit_name')->get();

        // dd($lagPollingUnitData);

        $TotalDataPerUnit = [];

        foreach($lagPollingUnitData as $value){
            $TotalDataPerUnit[$value['polling_unit_name']] = PuResults::where('polling_unit_uniqueid', $value['polling_unit_id'])->sum('party_score');
        }

        return view('government', ['polling_unit_result' => $TotalDataPerUnit, 'lga' => $lagUnit->lga_name, 'local_gov' => $this->local_gov_list]);

    }

}
