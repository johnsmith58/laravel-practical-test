@extends('layouts.app')

@section('content')
    <div class="container-fluid survery-container p-3">
        <div class="row">
            @foreach($surveys as $survey)
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Fill User: {{ $survey->name }}</h5>
                            Like count : {{ $survey->likes_count }}
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <p class="card-text">User name: {{ $survey->name }}</p>
                                    <p class="card-text">Email: {{ $survey->email }}</p>
                                    <p class="card-text">Phone Number: {{ $survey->phone_number }}</p>
                                </div>
                                <div class="col-6">
                                    <p class="card-text">DOB: {{ $survey->dob }}</p>
                                    <p class="card-text">Gender: {{ $survey->gender }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection