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
        $this->local_gov_list = LocalGov::select('uniqueid','lga_name')->where('lga_name', '!=', '')->get();
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

        $lagUnit = LocalGov::with('pollingunit.puresults')->where('uniqueid', $lga_id)->first();

        $out = [];
        foreach($lagUnit->pollingunit as $value ){

            $out[$value['polling_unit_name']] = array_sum(array_column($value->puresults->toArray(), 'party_score')) ;
        }

        return view('government', ['polling_unit_result' => $out, 'lga' => $lagUnit->lga_name, 'local_gov' => $this->local_gov_list]);

    }

}
