@extends('admin.admin_master')
@section('admin')
  <div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic form elements</h4>
          <p class="card-description"> Basic form elements </p>
          <form class="forms-sample" method="POST" action="{{ route('store.subcategory') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputName1">Sub-Category English</label>
              <input name="subcategory_en" type="text" class="form-control" id="exampleInputName1" placeholder="Please Type English Sub-Category Name">
              @error('subcategory_en')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Sub-Category Turkish</label>
              <input name="subcategory_tr" type="text" class="form-control" id="exampleInputEmail3" placeholder="Please Type Turkish Sub-Category Name">
              @error('subcategory_tr')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">Category</label>
              <select name="category_id"class="form-control" id="exampleSelectGender">
                <option disabled selected="">Select a Category</option>
                @foreach ($category as $row )
                  {{-- <?php if($row->id == $category->category_id) echo "Selected"; ?> --}}
                  <option value='{{ $row->id }}'> {{ $row->category_en }} | {{ $row->category_tr }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Insert</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
