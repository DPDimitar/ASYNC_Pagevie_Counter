@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{ __('Statistics') }}</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header"><h1>{{ __('By Day') }}</h1></div>

                    <div class="card-body">
                        <div class="row">
                            <div style="max-height: 500px; overflow-y: scroll" class="col-6">
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Day</th>
                                    <th>Without authorization</th>
                                    </thead>
                                    <tbody>
                                    @foreach($logs_by_day_unauthorized as $item)
                                        <tr>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->views_count}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="max-height: 500px; overflow-y: scroll" class="col-6">
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Day</th>
                                    <th>With authorization</th>
                                    </thead>
                                    <tbody>
                                    @foreach($logs_by_day_authorized as $item)
                                        <tr>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->views_count}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header"><h1>{{ __('By Month') }}</h1></div>

                    <div class="card-body">
                        <div class="row">
                            <div style="max-height: 500px; overflow-y: scroll" class="col-6">
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Month</th>
                                    <th>Without authorization</th>
                                    </thead>
                                    <tbody>
                                    @foreach($logs_by_month_unauthorized as $item)
                                        <tr>
                                            <td>{{$item->month}}</td>
                                            <td>{{$item->views_count}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="max-height: 500px; overflow-y: scroll" class="col-6">
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Month</th>
                                    <th>With authorization</th>
                                    </thead>
                                    <tbody>
                                    @foreach($logs_by_month_authorized as $item)
                                        <tr>
                                            <td>{{$item->month}}</td>
                                            <td>{{$item->views_count}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
