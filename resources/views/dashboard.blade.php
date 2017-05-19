@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

    <div class="dashboard" id="dashboard">
        <analytics website="Ellipse" grid="a1:b1" view="51745830"></analytics>
        <analytics website="Psylio Canada" grid="a2:b2" view="115161520"></analytics>
        <analytics website="Epsylio" grid="a3:b3" view="107066110"></analytics>
        <google-calendar grid="c1:c3"></google-calendar>
        <current-time grid="e1" dateformat="ddd DD/MM"></current-time>
        <packagist-statistics grid="e2"></packagist-statistics>
        <internet-connection></internet-connection>
    </div>
@endsection
