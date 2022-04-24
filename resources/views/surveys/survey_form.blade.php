@extends('layouts.app')

@section('content')
    <div class="container-fluid survery-container">
        <div class="form-container">
            <h5>Survey Form</h5>
            @if($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            @endif
            <form method="POST" action="{{ route('survey-forms-store') }}">
              {{ csrf_field() }}
                <hr>
                <div class="form-group">
                    <label>User Name</label>
                    <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="user_name" placeholder="Enter User name">
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input name="phone_number" value="{{ old('phone_number') }}" type="number" class="form-control" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                  <label>Date Of Birth</label>
                  <input name="dob" value="{{ old('dob') }}" type="date" class="form-control" placeholder="Enter Date Of Birth">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Gender</label>
                    <select value="{{ old('gender') }}" name="gender" class="form-control" id="exampleFormControlSelect1">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Remark</label>
                    <textarea name="remark" class="form-control" rows="3">{{ old('remark') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection