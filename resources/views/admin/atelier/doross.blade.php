@extends('admin.layouts.master')

@section('content')

<div class="block block-rounded">
<div class="block-header block-header-default">
  <h3 class="block-title">List doross</h3>
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
        <th>id</th>
        <th>name</th>
        <th>type</th>
        <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th>
        <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach ($doross as $drs)
        <tr>
            <td class="text-center">
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="checkbox" value="" id="row_1" name="row_1">
                <label class="form-check-label" for="row_1"></label>
              </div>
            </td>
            <td>
              <p class="fw-semibold mb-1">
                <a href="be_pages_generic_profile.html">{{$drs->id}}</a>
              </p>
            </td>
            <td class="d-none d-sm-table-cell">
              <span class="">{{$drs->name}}</span>
            </td>
            <td class="d-none d-sm-table-cell">
                <span class="">{{$drs->types->name}}</span>
              </td>
            
            <td class="d-none d-sm-table-cell">
              <em class="fs-sm text-muted">{{$drs->created_at}}</em>
            </td>
            <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#e-{{$drs->id}}">E</button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#d-{{$drs->id}}">D</button>
            </td>
          </tr>



          <!-- Slide Left Block Modal chack suppressions -->
          <div class="modal fade" id="e-{{$drs->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Etes vous sure?</h3>
                    <div class="block-options">
                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="block-content text-center ">
                    <h4 class=" text-bold ">Doross : <span class="badge bg-danger">{{$drs->name}}</span> Will be deleted</h4>
                </div>
                <form action="{{route('admin.atelier.doross.update')}}" method="POST" >
                    <div class="block-content">
                      @csrf
                      <div class="mb-4">
                          <label for="">Name : </label>
                          <input type="hidden" name="id" value="{{ $drs->id }}" class="form-control">
                          <input type="text" name="name" value="{{ $drs->name }}" class="form-control">
                      </div>
                      <div class="mb-4">
                        <label for="">Type : </label>
                        <select type="text" name="type" class="form-select" >
                          <option value="-">-</option>
                          @foreach ($ateliertypes as $type)
                          <option value="{{$type->id}}">{{$type->name}}</option>
                          @foreach ($type->parents as  $parent)
                               @if ($parent->id ==  $type->parent)
                               
                                 <option value="{{$parent->id}}"> - {{$parent->name}}</option>
   
                               @endif
                               @endforeach
   
                       @endforeach
                        </select>
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

          <!-- Slide Left Block Modal chack suppressions -->
                <div class="modal fade" id="d-{{$drs->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-slideleft" role="document">
                    <div class="modal-content">
                        <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Etes vous sure?</h3>
                            <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                            </div>
                        </div>
                        <div class="block-content text-center ">
                            <h4 class=" text-bold ">Doross : <span class="badge bg-danger">{{$drs->name}}</span> Will be deleted</h4>
                        </div>
                        <form action="{{route('admin.atelier.doross.delete')}}" method="POST">
                            <div class="block-content">
                                @csrf
                                    <input type="hidden" name="id" value="{{$drs->id}}" class="form-control">
                            </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>

        @endforeach
    
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