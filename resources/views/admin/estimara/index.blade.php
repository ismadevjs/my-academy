@extends('admin.layouts.master')

@section('content')

<div class="block block-rounded">
<div class="block-header block-header-default">
  <h3 class="block-title">List des estimaras</h3>
  <div class="block-options">
    <div class="block-options-item">
    </div>
  </div>
</div>
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
        <th>Students</th>
        <th>Atelier</th>
        <th>Niveaux</th>
        <th>Modules</th>
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
            <a href="be_pages_generic_profile.html">Jose Mills</a>
          </p>
        </td>
        <td class="d-none d-sm-table-cell">
          <span class="">Atelier</span>
        </td>
        <td class="d-none d-sm-table-cell">
            <span class="">s1</span>
          </td>
          <td class="d-none d-sm-table-cell">
            <span class="">math</span>
          </td>
        <td class="d-none d-sm-table-cell">
          <em class="fs-sm text-muted">March 17, 2018 09:41</em>
        </td>
        <td>
            <button class="btn btn-success">E</button>
            <button class="btn btn-info">V</button>
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