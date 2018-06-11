@extends('layouts.ticketLayout')


@section('content')
    {{--alert pop up when ticket has been raised succesfully--}}
    <div class="container" >
        <div class="row">

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
        </div>

    </div>
    @endif
    <div class="container" >
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: steelblue">Raise Ticket</div>
                    <div class="panel-body" >
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('raise') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('issue') ? ' has-error' : '' }}">
                                <label for="issue" class="col-md-4 control-label">Issue</label>

                                <div class="col-md-6">
                                    <input list="issue" type="text" class="form-control" name="issue"  required autofocus>

                                    @foreach( $issuesdropdowns as $issuesdropdown  )
                                        @for ($i = 0 ; $i < count($issuesdropdowns); $i++)

                                            <datalist id="issue">
                                                <option value={{$issuesdropdowns[0]}}>

                                                <option value={{$issuesdropdowns[1]}}>

                                                <option value={{$issuesdropdowns[2]}}>

                                                <option value={{$issuesdropdowns[3]}}>

                                                <option value={{$issuesdropdowns[4]}}>

                                                <option value={{$issuesdropdowns[5]}}>

                                                <option value={{$issuesdropdowns[6]}}>

                                                <option value={{$issuesdropdowns[7]}}>

                                                <option value={{$issuesdropdowns[8]}}>

                                                <option value={{$issuesdropdowns[9]}}>

                                                <option value={{$issuesdropdowns[10]}}>

                                                <option value={{$issuesdropdowns[11]}}>

                                                <option value={{$issuesdropdowns[12]}}>

                                                <option value={{$issuesdropdowns[13]}}>

                                            </datalist>

                                        @endfor
                                    @endforeach
                                    @if ($errors->has('issue'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('issue') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group" >
                              <div class="col-md-6">
                                    <input id="it_person" class="form-control" type="hidden" name="it_person" value="Not assigned" >

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" rows="6" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group"  >
                                <div class="col-md-6">
                                    <input id="ticket_status" class="form-control" type="hidden"  name="ticket_status" value="Pending" >

                                </div>
                            </div>

                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Raise
                                    </button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

