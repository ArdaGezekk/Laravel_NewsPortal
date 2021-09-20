@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic form elements</h4>
        <p class="card-description"> Basic form elements </p>
        <form class="forms-sample" method="POST" action="{{ route('store.district') }}">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">District English</label>
            <input name="district_en" type="text" class="form-control" id="exampleInputName1" placeholder="Please Type English District Name">
            @error('district_en')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">District Turkish</label>
            <input name="district_tr" type="text" class="form-control" id="exampleInputEmail3" placeholder="Please Type Turkish District Name">
            @error('district_tr')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Insert</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
