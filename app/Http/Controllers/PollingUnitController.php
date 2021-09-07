<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Validator;
use App\Models\PollingUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PollingUnitController extends Controller
{

    private $polling_unit_list; 

    public function __construct(){
        $this->polling_unit_list = PollingUnit::select('uniqueid','polling_unit_name')->where('polling_unit_name', '!=', '')->get();
    }

    /**
     * Show all of the available polling units
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard', ['polling_unit' => $this->polling_unit_list]);
    }


    /**
     * Get polling unit results
     * 
     * @return Response
     */

     public function getPollingUnitResult(Request $request){

        $polling_unit_id =  $request->polling_unit;
        $pollingUnit = PollingUnit::where('uniqueid', $polling_unit_id)->first();
        $polling_unit_results = $pollingUnit->puresults()->select('party_abbreviation','party_score','date_entered','entered_by_user')->get();

        return view('dashboard', ['polling_unit_result' => $polling_unit_results, 'polling_unit_name' => $pollingUnit->polling_unit_name, 'polling_unit' => $this->polling_unit_list]);
     }
}
