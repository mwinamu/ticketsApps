@extends( 'layouts.app' )

@section( 'content' )
    {{--alert pop up when updated  succesfully--}}
    <div class = "container" >
        <div class = "row" >
            @if( session() -> has( 'message' ))
                <div class = "alert alert-success alert-dismissable" >
                    <a href = "#" class= "close" data-dismiss= "alert" aria-label= "close">&times;</a>
                    {{ session()->get('message') }}
                </div>
        </div>

    </div>
    @endif
    <div class="container" >
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: steelblue">EDIT TICKET</div>
                    <div class="panel-body" >
    <form class="form-horizontal" role="form" method="POST" action="{{ route('update') , $id = $register_ticket -> id }}">
        {{ csrf_field() }}
        <div class="panel-body">
            <div class="container-fluid">
                <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                    <label for="id" class="col-md-4 control-label"></label>

                    <div class="col-md-6">
                        <input id="id" type="hidden" class="form-control" name="id" value="{{$register_ticket -> id}}" required autofocus>

                        @if ($errors->has('id'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('id') }}</strong>
                                                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username" value="{{$register_ticket -> username}}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('username') }}</strong>
                                                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="form-group{{ $errors->has('issue') ? ' has-error' : '' }}">
                    <label for="issue" class="col-md-4 control-label">Issue</label>

                    <div class="col-md-6">
                        <input id="issue" type="text" class="form-control" name="issue" value="{{$register_ticket -> issue}}" required autofocus>

                        @if ($errors->has('issue'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('issue') }}</strong>
                                                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">Description</label>

                    <div class="col-md-6">
                        <input id="description" type="text" class="form-control" name="description" value="{{$register_ticket -> description}}" required autofocus>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="form-group{{ $errors->has('ticket_status') ? ' has-error' : '' }}">
                    <label for="ticket_status" class="col-md-4 control-label">Status</label>

                    <div class="col-md-6">
                        <input list="ticket_status" type="text" class="form-control" name="ticket_status" {{--value="{{$register_ticket -> ticket_status}}"--}} required autofocus>
                        @foreach( $status as $s  )
                            @for ($i = 0 ; $i < count($status); $i++)

                                <datalist id="ticket_status">
                                    <option value={{$status[0]}}>

                                    <option value={{$status[1]}}>

                                    <option value={{$status[2]}}>

                                    <option value={{$status[3]}}>

                                   <option value={{$status[4]}}>

                                    <option value={{$status[5]}}>

                                    <option value={{$status[6]}}>

                                    <option value={{$status[7]}}>

                                    <option value={{$status[8]}}>

                                    <option value={{$status[9]}}>

                                    <option value={{$status[10]}}>


                                </datalist>

                            @endfor
                        @endforeach
                        @if ($errors->has('ticket_status'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('ticket_status') }}</strong>
                                                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="form-group{{ $errors->has('it_person') ? ' has-error' : '' }}">
                    <label for="it_person" class="col-md-4 control-label">It person</label>

                    <div class="col-md-6">
                        <input list="it_person" type="text" class="form-control" name="it_person" {{--value="{{$register_ticket -> it_person}}" --}}required autofocus>
                        @foreach( $it_persons as $it_person  )
                            @for ($i = 0 ; $i < count($it_persons); $i++)

                                <datalist id="it_person">
                                    <option value={{$it_persons[0]}}>

                                    <option value={{$it_persons[1]}}>

                                    <option value={{$it_persons[2]}}>

                                    <option value={{$it_persons[3]}}>

                                    <option value={{$it_persons[4]}}>

                                    <option value={{$it_persons[5]}}>

                                    <option value={{$it_persons[6]}}>

                                    <option value={{$it_persons[7]}}>

                                    <option value={{$it_persons[8]}}>

                                    <option value={{$it_persons[9]}}>

                                    <option value={{$it_persons[10]}}>

                                    <option value={{$it_persons[11]}}>

                                </datalist>

                            @endfor
                         @endforeach
                        @if ($errors->has('it_person'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('it_person') }}</strong>
                                                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
               UPDATE
            </button>
        </div>
    </form>
    </div>
</div>
</div>
</div>



    </div>

@endsection