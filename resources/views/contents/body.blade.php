<div class="container col-md-12" >
     @if(session()->has('message'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
    </div>

</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: steelblue">Dashboard</div>
                <div class="panel-body">

                <div class="container-fluid">
                    <table class="table table-striped table-responsive" id="ticket">
                        <thead>
                            <tr>
                                <th>TICKET</th>
                                <th>NAME</th>
                                <th>ISSUE</th>
                                <th>DESCRIPTION</th>
                                <th>IT PERSON</th>
                                <th>STATUS</th>
                                <th  style="text-align: center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id = "tickets_body">
                        @foreach($register_tickets as $register_ticket)
                         <tr id ="tickets_row" >
                                <td id="id">{{$register_ticket -> id}}</td>
                                <td id="username">{{$register_ticket -> username}}</td>
                                <td id="issue">{{$register_ticket -> issue}}</td>
                                <td id="description">{{$register_ticket -> description}}</td>
                                <td id="it_person">{{$register_ticket -> it_person}}</td>
                                <td id="status">{{$register_ticket -> ticket_status}}</td></td>
                                <td><a href="{{url('edit', array($register_ticket -> id))}}" class="btn btn-warning btn-sm" style="background-color: steelblue" >Edit</a>
                                <a href="{{route('assign', array($register_ticket -> id , Auth::user() -> name ))}}" class="btn btn-warning btn-sm" style="background-color: darkgreen" >Take</a>
                                <a href="{{route('done', array($register_ticket -> id , Auth::user() -> name ))}}" class="btn btn-warning btn-sm" style="background-color: steelblue" >Done</a></td>
                         </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{$register_tickets-> links()}}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
