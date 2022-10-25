@extends('admin.layouts.master')

@section('content')

<div class="block block-rounded">
<div class="block-header block-header-default">
  <h3 class="block-title">List des ateliers</h3>
  <button type="button" class="btn btn-success push" data-bs-toggle="modal" data-bs-target="#modal-block-slideleft">Ajouter une atelier</button>
  <div class="block-options">
    <div class="block-options-item">
    </div>
  </div>
</div>
<!-- Slide Left Block Modal -->
<div class="modal fade" id="modal-block-slideleft" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideleft" role="document">
      <div class="modal-content">
        <div class="block block-rounded block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">Ajouter Une Atelier</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
              </button>
            </div>
          </div>
          <form action="{{route('admin.atelier.add')}}" method="POST" enctype="multipart/form-data">
              <div class="block-content">
                @csrf
                <div class="mb-4">
                    <label for="">Name : </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="">icon : </label>
                    <input type="file" name="icon" class="form-control">
                </div>
          
             </div>
          <div class="block-content block-content-full text-end bg-body">
            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-success" >save</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END Slide Left Block Modal -->
<div class="block-content">
  <!-- If you put a checkbox in thead section, it will automatically toggle all tbody section checkboxes -->
  <table class="js-table-checkable table table-hover table-vcenter">
    <thead>
      <tr>
        <th class="text-center" style="width: 70px;">
          <div class="form-check d-inline-block">
            <input class="form-check-input" type="checkbox" value="" id="check-all" name="check-all">
            <label class="form-check-label" for="check-all"></label>
          </div>
        </th>
        <th>id</th>
        <th>icon</th>
        <th>Name</th>
        <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th>
        <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-center">
          <div class="form-check d-inline-block">
            <input class="form-check-input" type="checkbox" value="" id="row_1" name="row_1">
            <label class="form-check-label" for="row_1"></label>
          </div>
        </td>
        <td>
          <p class="fw-semibold mb-1">
                1
        </p>
        </td>
        <td class="d-none d-sm-table-cell">
          <span class="">icon</span>
        </td>
        <td class="d-none d-sm-table-cell">
            <span class="">Atelier 1</span>
          </td>
        
        <td class="d-none d-sm-table-cell">
          <em class="fs-sm text-muted">March 17, 2018 09:41</em>
        </td>
        <td>
            <button class="btn btn-success">E</button>
            <button class="btn btn-danger">D</button>
        </td>
      </tr>
    
    </tbody>
  </table>
</div>
</div>
<!-- END Checkable Table -->
@endsection

@push('scripts')
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>Dashmix.helpersOnLoad(['dm-table-tools-checkable', 'dm-table-tools-sections']);</script>

@endpush