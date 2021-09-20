@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic form elements</h4>
        <p class="card-description"> Basic form elements </p>
        <form class="forms-sample" method="POST" action="{{ route('store.category') }}">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Category English</label>
            <input name="category_en" type="text" class="form-control" id="exampleInputName1" placeholder="Please Type English Category Name">
            @error('category_en')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Category Turkish</label>
            <input name="category_tr" type="text" class="form-control" id="exampleInputEmail3" placeholder="Please Type Turkish Category Name">
            @error('category_tr')
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
