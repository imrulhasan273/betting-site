@extends('layouts.frontend')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Match</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>Ban VS Aus</td>
                <td>Win</td>
            </tr>
            <tr>
                <td scope="row">2</td>
                <td>Bra VS Arg</td>
                <td>Loss</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
