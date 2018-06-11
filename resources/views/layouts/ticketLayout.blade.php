<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
    {{--INCLUDES THE SCRIPTS BLADE IN INCLUDES--}}
    @include('includes.script')
</head>
<body>
{{--navbar content--}}
@include('includes.ticketNavbar')

</body>
</html>