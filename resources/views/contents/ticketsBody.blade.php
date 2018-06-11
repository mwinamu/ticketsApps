<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <div class="panel-heading" style="background-color: steelblue">Tickets</div>
                <div class="panel-body">

                        <table class="table table-striped table-responsive" id="ticket">
                            <thead>
                            <tr>
                                <th>TICKET</th>
                                <th>NAME</th>
                                <th>ISSUE</th>
                                <th>DESCRIPTION</th>
                                <th>IT PERSON</th>
                                <th>STATUS</th>

                            </tr>
                            </thead>
                            <tbody id = "tickets_body">
                            @foreach($register_tickets as $register_ticket)
                                <tr id ="tickets_row">
                                    <td id="id">{{$register_ticket -> id}}</td>
                                    <td id="username">{{$register_ticket -> username}}</td>
                                    <td id="issue">{{$register_ticket -> issue}}</td>
                                    <td id="description">{{$register_ticket -> description}}</td>
                                    <td id="it_person" >{{$register_ticket -> it_person}}</td>
                                    <td id="ticket_status">{{$register_ticket -> ticket_status}}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$register_tickets-> render( ) }}

            </div>
            </div>
        </div>
    </div>
</div>