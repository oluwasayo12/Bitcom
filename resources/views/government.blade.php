@include('header') 
            <div class="app-main">
            @include('sidebar')  
                <div class="app-main__outer">
                    <div class="app-main__inner">

                    @if(!empty($lga)) 
                        <h5>Result for LGA: <b>{{$lga}}</b></h5>
                    @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Total LGA Result
                                        <form class="form-inline btn-actions-pane-right" method="post" action="{{ route('getlgaResult') }} ">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                <label for="pollingUnit" class="mr-sm-2">Select Local Government</label>
                                                <select class="form-control-sm form-control" name="lga">
                                                    <option>---Select Local Government---</option>
                                                    @foreach($local_gov as $data)
                                                        <option value="{{ $data->uniqueid }}" >{{ $data->lga_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="btn-actions-pane-right">
                                                <div role="group" class="btn-group-sm btn-group">
                                                    <input type="submit" class="btn btn-primary" value="Check Results">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Polling Unit</th>
                                                <th class="text-center">Sum Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @if(!empty($polling_unit_result))
                                                @foreach($polling_unit_result as $key => $result)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{$key}}
                                                        </td>
                                                        <td class="text-center">{{$result}}</td>
                                                        
                                                    </tr>
                                                @endforeach
                                           @else
                                                <tr>
                                                    <td></td>
                                                    <td class="text-center">No record found</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    @include('footer') 
