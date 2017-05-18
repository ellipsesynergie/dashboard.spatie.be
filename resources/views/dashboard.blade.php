@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

    <div class="dashboard" id="dashboard">
        <current-time grid="e1" dateformat="ddd DD/MM"></current-time>
        <packagist-statistics grid="e2"></packagist-statistics>

        <internet-connection></internet-connection>
    </div>
@endsection
