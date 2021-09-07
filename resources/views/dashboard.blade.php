@include('header') 
            <div class="app-main">
            @include('sidebar')  
                <div class="app-main__outer">
                    <div class="app-main__inner">

                    @if(!empty($polling_unit_name)) 
                        <h5>Result for <b>{{$polling_unit_name}}</b></h5>
                    @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Individual Polling Unit Result
                                        <form class="form-inline btn-actions-pane-right" method="post" action="{{ route('getResult') }} ">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                                <label for="pollingUnit" class="mr-sm-2">Select Polling Unit</label>
                                                <select class="form-control-sm form-control" name="polling_unit">
                                                    <option>---Select Polling Unit---</option>
                                                    @foreach($polling_unit as $data)
                                                        <option value="{{ $data->uniqueid }}" >{{ $data->polling_unit_name }}</option>
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
                                                <th class="text-center">Party Abbreviation</th>
                                                <th class="text-center">Party Score</th>
                                                <th class="text-center">Entered by</th>
                                                <th class="text-center">Date entered</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($polling_unit_result))
                                                @foreach($polling_unit_result as $result)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{$result->party_abbreviation}}
                                                        </td>
                                                        <td class="text-center">{{$result->party_score}}</td>
                                                        <td class="text-center">
                                                            <div class="badge badge-warning">
                                                                <?php $user = (empty($result->entered_by_user)) ? 'n/a' : $result->entered_by_user; ?>
                                                                {{$user}}
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            {{$result->date_entered}}
                                                        </td>
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
