@extends('backend.layout.base')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Perusahaan</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active" aria-current="page">Perusahaan</li>
            </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

<form method="POST" action="{{ route('perusahaan.update', $data->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Informasi Perusahaan</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center py-sm-3 py-md-5">
              
                <div class="col-sm-10 col-md-8">
                  <div class="form-group row mb-4">
                    <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-3 col-form-label">Kode Perusahaan</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="kode" value="{{ $data->kode }}">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-3 col-form-label">Siup</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="siup" value="{{ $data->siup }}">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-3 col-form-label">NPWP</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="npwp" value="{{ $data->npwp }}">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-3 col-form-label">Contact Person</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="kontak" value="{{ $data->kontak }}">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="phone" value="{{ $data->phone }}">
                    </div>
                  </div>
                  @foreach($array as $key => $value)
                    <div class="form-group row mb-4">
                        <label class="col-sm-3 col-form-label">
                            <div id="labelEmail">Email</div>
                        </label>
                        <div class="col-sm-5">
                        <input type="email" class="form-control" name="email[]" value="{{ $value }}">
                        </div>
                        <div class="col-2">
                        <button type="button" id="addEmail" class="btn btn-sm btn-alt-primary">
                            <i class="fa fa-plus"></i>
                        </button>
                        </div>
                    </div>
                  @endforeach
                  <div id="newEmail"></div>
                  <div class="form-group row mb-4">
                    <label class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-5">
                      <textarea type="text" class="form-control" rows="5" name="alamat">{{ $data->alamat }}</textarea>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Freight</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row justify-content-center py-sm-3 py-md-5">
                <div class="col-sm-10 col-md-8">
                  <div class="row mb-4">
                    <div class="col-4">
                        <label class="form-label">Port of Loading</label>
                        <select class="select2-multiple form-control" name="loading[]">
                            <option value="">Select</option> 
                            @foreach ($port as $value)
                                <option value="{{ $value->id }}" {{ ($value->id == $data->loading) ? 'selected' : '' }}>{{ $value->nama }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-4">
                        <label class="form-label">Port of Discharge</label>
                        <select class="select2-multiple form-control" name="discharge[]">
                                <option value="">Select</option> 
                            @foreach ($port as $value)
                                <option value="{{ $value->id }}" {{ ($value->id == $data->discharge) ? 'selected' : '' }}>{{ $value->nama }}</option> 
                            @endforeach
                        </select>
                      </div>
                      <div class="col-2">
                        <label class="form-label" for="block-form7-username">Freight</label>
                        <input type="number" class="form-control" name="freight[]" value="{{ $data->freight }}">
                      </div>
                      <div class="col-2">
                        <label class="form-label" id="labelPort" for="block-form7-username">Action</label>
                        <div>
                          <button type="button" id="addPort" class="btn btn-sm btn-alt-primary">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                </div>
                <div id="newPort" class="row justify-content-center"></div>
            </div>
        </div>
        <div class="block-content block-content-full block-content-sm bg-body-light">
            <button type="submit" class="btn btn-sm btn-alt-primary">
                <i class="fa fa-check opacity-50 me-1"></i> Submit
            </button>
            <button type="submit" class="btn btn-sm btn-alt-danger">
                <i class="fa fa-xmark opacity-50 me-1"></i> Cancel
            </button>
        </div>
    </div>
</form>

</div>
<!-- END Page Content -->

@endsection

@section('scriptBottom')

    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });
    </script>

    <script>

      // add multiple email
      $("#addEmail").click(function() {
        newEmailAdd =
                    '<div class="form-group row mb-4" id="mail">' +
                    '<label class="col-sm-3 col-form-label"></label>' +
                    '<div class="col-sm-5" ><input type="email" class="form-control" name="email[]"></div>' +
                    '<div class="col-2"><button type="button" id="removeEmail" class="btn btn-sm btn-alt-danger">' +
                    '<i class="fa fa-minus"></i></button></div></div>';


        $("#newEmail").append(newEmailAdd);
      });

      // remove multiple email
      $("body").on("click", "#removeEmail", function () {
        $(this).parents("#mail").remove();
      });

      //add multiple port
      $("#addPort").click(function() {

        newPortAdd = 
                    '<div class="col-sm-10 col-md-8" id="port">' +
                    '<div class="row mb-4">' +
                    '<div class="col-4">' +
                    '<label class="form-label">Port of Loading</label>' +
                    '<select class="select2-multiple form-control" name="loading[]">' +
                    '<option value="">Select</option>@foreach ($port as $value)' +
                    '<option value="{{ $value->id }}">{{ $value->nama }}</option>@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-4">' +
                    '<label class="form-label">Port of Discharge</label>' +
                    '<select class="select2-multiple form-control" name="discharge[]">' +
                    '<option value="">Select</option>@foreach ($port as $value)' +
                    '<option value="{{ $value->id }}">{{ $value->nama }}</option>@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label class="form-label" for="block-form7-username">Freight</label>' +
                    '<input type="number" class="form-control" name="freight[]">' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label class="form-label" for="block-form7-username">Action</label>' +
                    '<div>' +
                    '<button type="submit" id="removePort" class="btn btn-sm btn-alt-danger">' + 
                    '<i class="fa fa-minus"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

        $("#newPort").append(newPortAdd);

      });


        // remove multiple port
        $("body").on("click", "#removePort", function () {
          $(this).parents("#port").remove();
        });


        $('[id]').each(function() {
            var $ids = $('[id=' + this.id + ']');
            if ($ids.length > 1) {
                $ids.not(':first').remove();
            }
        });

    </script>

@endsection
