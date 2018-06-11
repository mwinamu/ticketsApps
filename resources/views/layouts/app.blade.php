<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('includes.head')
    {{--INCLUDES THE SCRIPTS BLADE IN INCLUDES--}}
   {{-- @include('includes.script')--}}
    @include('scripts.modal_script')

</head>
<body>
{{--navbar content--}}
@include('includes.navbar')
    <!-- sidebar content -->


{{--footer/copyright here--}}
{{--@include('includes.footer')--}}
    <!-- Scripts -->


</body>
</html>
