<div class="modal fade" id="editModal"
     tabindex="-1" role="dialog"
     aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header" style="background-color: steelblue">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="editModalLabel" style="color: black">EDIT TICKET </h4>
                </div>
                    <div class="modal-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('home') }}">
                            {{ csrf_field() }}
                            <div class="panel-body">

                                <div class="container-fluid">
                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label for="username" class="col-md-4 control-label">Username</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control" name="username" value="{{--{{$register_ticket -> username}}--}}" required autofocus>

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
                                            <input id="issue" type="text" class="form-control" name="issue" value=""{{--"{{$register_ticket -> issue}}"--}} required autofocus>

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
                                            <input id="description" type="text" class="form-control" name="description" value=""{{--"{{$register_ticket -> description}}"--}} required autofocus>

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
                                            <input id="ticket_status" type="text" class="form-control" name="ticket_status" value="{{--{{$register_ticket -> ticket_status}}--}}" required autofocus>

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
                                            <input id="it_person" type="text" class="form-control" name="it_person" value="{{--{{$register_ticket -> it_person}}--}}" required autofocus>

                                            @if ($errors->has('it_person'))
                                                <span class="help-block">
                                                            <strong>{{ $errors->first('it_person') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>





                    </div>
                <div class="modal-footer">
                        <div>


                  <button type="submit" class="btn btn-primary" >
                    OK
                  </button>
                </span>
                    </div>
                </div>
        </div>
    </div>
</div>