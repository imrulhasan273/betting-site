<link rel="apple-touch-icon" sizes="76x76" href=" {{asset('backend/img/apple-icon.png')}} ">
<link rel="icon" type="image/png" href="{{asset('backend/img/favicon.png')}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>
    {{ config('app.name') }} || Dashboard
</title>
{{-- <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' /> --}}
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

<script src="{{asset('backend/js/datatables.min.js')}}"></script>

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS Files -->
<link href="{{asset('backend/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />

<link href="{{asset('backend/css/jquery.dataTables.min')}}" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{asset('backend/demo/demo.css')}}" rel="stylesheet" />



<!-- Data Table CSS and JS CDN -->

{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/> --}}

{{------================================= EXTRA PRO VERSION ==============================================--}}

<link href="{{asset('backend\assets\css\material-dashboard.min1c51.css')}}" rel="stylesheet" />


<style>
.table-nostriped tbody tr:nth-of-type(odd) {
    background-color:transparent;
}
</style>
