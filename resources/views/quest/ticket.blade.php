@extends('layouts.ticketLayout')
@section('content')
    {{--including side bar--}}
 @include('includes.sidebar')
       {{--including body from contents folder--}}

    @include('contents.ticketsBody').



@endsection
{{--

<script type="text/javascript">

    alert("here");

</script>--}}
