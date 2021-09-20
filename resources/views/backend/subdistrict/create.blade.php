@extends('admin.admin_master')
@section('admin')
  <div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic form elements</h4>
          <p class="card-description"> Basic form elements </p>
          <form class="forms-sample" method="POST" action="{{ route('store.subdistrict') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputName1">Sub-District English</label>
              <input name="subdistrict_en" type="text" class="form-control" id="exampleInputName1" placeholder="Please Type English Sub-District Name">
              @error('subdistrict_en')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Sub-District Turkish</label>
              <input name="subdistrict_tr" type="text" class="form-control" id="exampleInputEmail3" placeholder="Please Type Turkish Sub-District Name">
              @error('subdistrict_tr')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">District</label>
              <select name="district_id"class="form-control" id="exampleSelectGender">
                <option disabled selected="">Select a District</option>
                @foreach ($district as $row )
                  {{-- <?php if($row->id == $district->district_id) echo "Selected"; ?> --}}
                  <option value='{{ $row->id }}'> {{ $row->district_en }} | {{ $row->district_tr }}</option>
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
