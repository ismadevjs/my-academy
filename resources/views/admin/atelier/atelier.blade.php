@extends('admin.layouts.master')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/js/plugins/select2/css/select2.min.css')}}">
@endpush

@section('content')

<div class="mb-4">
  <div class="row">
    <div class=" mb-4 col-md-6 col-xl-4">
      <a data-bs-toggle="modal" data-bs-target="#add-type" class="block block-rounded block-transparent block-link-pop bg-gd-leaf h-100 mb-0" href="javascript:void(0)">
        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
          <div>
            <p class="fs-lg fw-semibold mb-0 text-white">
              Ajouter un type
            </p>
            <p class="text-white-75 mb-0">
              {{-- UI Design --}}
            </p>
          </div>
          <div class="ms-3 item">
            <i class="fa fa-2x fa-vector-square text-white-50"></i>
          </div>
        </div>
      </a>
    </div>

    <div class=" mb-4 col-md-6 col-xl-4">
      <a  data-bs-toggle="modal" data-bs-target="#modal-block-slideleft" class="block block-rounded block-transparent block-link-pop bg-gd-sea h-100 mb-0" href="javascript:void(0)">
        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
          <div>
            <p class="fs-lg fw-semibold mb-0 text-white">
              Ajouter une atteliers
            </p>
            <p class="text-white-75 mb-0">
              {{-- UI Design --}}
            </p>
          </div>
          <div class="ms-3 item">
            <i class="fa fa-2x fa-vector-square text-white-50"></i>
          </div>
        </div>
      </a>
    </div>
   
    <div class="mb-4 col-md-6 col-xl-4">
      <a data-bs-toggle="modal" data-bs-target="#add-doross" class="block block-rounded block-transparent block-link-pop bg-gd-fruit  h-100 mb-0" href="javascript:void(0)">
        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
          <div>
            <p class="fs-lg fw-semibold mb-0 text-white">
              Ajotuer doross
            </p>
            <p class="text-white-75 mb-0">
              {{-- UI Design --}}
            </p>
          </div>
          <div class="ms-3 item">
            <i class="fa fa-2x fa-vector-square text-white-50"></i>
          </div>
        </div>
      </a>
    </div>

    <div class="mb-4 col-md-6 col-xl-4">
      <a class="block block-rounded block-transparent block-link-pop bg-gd-dusk  h-100 mb-0" href="{{route('admin.atelier.doross.list')}}">
        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
          <div>
            <p class="fs-lg fw-semibold mb-0 text-white">
              List doross
            </p>
            <p class="text-white-75 mb-0">
              {{-- UI Design --}}
            </p>
          </div>
          <div class="ms-3 item">
            <i class="fa fa-2x fa-vector-square text-white-50"></i>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>


<div class="block block-rounded">
<div class="block-header block-header-default">
  <h3 class="block-title">List des ateliers</h3>
  {{-- <button type="button" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#modal-block-slideleft">Ajouter une atelier</button> --}}
  {{-- <button type="button" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#add-type">Ajouter un type</button> --}}
  <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#delete-all">Delete all</button>
  <div class="block-options">
    <div class="block-options-item">
    </div>
  </div>
</div>
<!-- Slide Left Block Modal -->
<div class="modal fade" id="add-type" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideleft" role="document">
    <div class="modal-content">
      <div class="block block-rounded block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Ajouter un type</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <form action="{{route('admin.atelier.type.add')}}" method="POST" enctype="multipart/form-data">
            <div class="block-content">
              @csrf

              <select type="text" name="parent" class="form-select">
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


              <div class="mb-4">
                  <label for="">Name : </label>
                  <input type="text" name="name" class="form-control">
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


<!-- Slide Left Block Modal -->
<div class="modal fade" id="add-doross" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideleft" role="document">
      <div class="modal-content">
        <div class="block block-rounded block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">Ajouter doross</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
              </button>
            </div>
          </div>
          <form action="{{route('admin.atelier.doross.add')}}" method="POST" >
              <div class="block-content">
                @csrf
                <div class="mb-4">
                    <label for="">Name : </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-4">
                  <label for="">Type : </label>
                  <select type="text" name="type" class="form-select" >
                    
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
  <!-- END Slide Left Block Modal -->
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
                  <label for="">Type : </label>

                  <select type="text" name="type[]" class="form-select" multiple>

                 
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

 
  <!-- Slide Left Block Modal -->
<div class="modal fade" id="delete-all" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
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
            <h4 class=" text-bold ">All Ateliers</span> Will be deleted</h4>
          </div>
          <form action="{{route('admin.atelier.delete.all')}}" method="POST">
            @csrf
          <div class="block-content block-content-full text-end bg-body">
            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
          </div>
        </form>
    
     
       
      </div>
    </div>
  </div>
</div>
<!-- END Slide Left Block Modal -->


<div class="block-content">
  <!-- If you put a checkbox in thead section, it will automatically toggle all tbody section checkboxes -->
  <div class="table-responsive">
    <table class="js-table-checkable table table-bordered table-striped table-vcenter">
      <thead>
        <tr>
          <th class="text-center" style="width: 70px;">
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="checkbox" value="" id="check-all" name="check-all">
              <label class="form-check-label" for="check-all"></label>
            </div>
          </th>
          <th lass="d-none d-sm-table-cell">id</th>
          <th lass="d-none d-sm-table-cell">icon</th>
          <th lass="d-none d-sm-table-cell">Name</th>
          <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th>
          <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ateliers as $atelier)
        <tr>
          <td class="text-center">
            <div class="form-check d-inline-block">
              <input class="form-check-input" type="checkbox" value="" id="row_1" name="row_1">
              <label class="form-check-label" for="row_1"></label>
            </div>
          </td>
          <td class="d-none d-sm-table-cell">
            <p class="fw-semibold mb-1">
                  #{{ $atelier->id }}
          </p>
          </td>
          <td class="d-none d-sm-table-cell">
            <img src="{{asset('public/Image/'. $atelier->icon )}}" width="50" height="50" class="img rounded-circle" alt="">
          </td>
          <td class="d-none d-sm-table-cell">
              <span class="">{{ $atelier->name }}</span>
            </td>
          
          <td class="d-none d-sm-table-cell">
            <em class="fs-sm text-muted">{{ $atelier->created_at->diffForHumans() }}</em>
          </td>
          <td class="d-none d-sm-table-cell">
              <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#v-{{$atelier->id}}">V</button>
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#e-{{$atelier->id}}">E</button>
              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#d-{{$atelier->id}}">D</button>
          </td>
        </tr>
        

         <!-- Slide Left Block Modal chack suppressions -->
         <div class="modal fade" id="e-{{$atelier->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
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
                  <h4 class=" text-bold ">Atelier : <span class="badge bg-danger">{{$atelier->name}}</span> Will be edited</h4>
              </div>
              <form action="{{route('admin.atelier.update')}}" method="POST" enctype="multipart/form-data">
                  <div class="block-content">
                    @csrf
                    <div class="mb-4">
                        <label for="">Name : </label>
                        <input type="hidden" name="id" value="{{$atelier->id}}" class="form-control">
                        <input type="text" name="name" value="{{$atelier->name}}" class="form-control">
                    </div>
                    <div class="mb-4">
                      <label for="">Type : </label>
    
                      <select type="text" name="type[]" class="form-select" multiple>
    
                     
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



        <!-- Slide Left Block Modal chack suppressions -->
  <div class="modal fade" id="v-{{$atelier->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideleft" role="document">
      <div class="modal-content">
        <div class="block block-rounded block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">Les types de cette atelier : {{$atelier->name}}</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
              </button>
            </div>
          </div>
          <div class="block-content text-center ">

            <div class="block-content">
              <p class="text-white text-uppercase fs-sm fw-bold text-center mt-2 mb-4">
                Atelier : {{$atelier->name}}
              </p>

              

              @if (gettype(json_decode($atelier->type)) == 'array')
                  @foreach (json_decode($atelier->type) as $type)
                    @foreach ($ateliertypes as $ty)
                      @if ($type == $ty->id)
                      <a class="block block-rounded block-link-rotate bg-black-10 mb-2" href="javascript:void(0)">
                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                          <div class="me-3">
                            <p class="text-white fs-3 fw-light mb-0">
                              
                            </p>
                            <p class="text-white-75 mb-0">
                              {{$ty->name}}
                            </p>
                          </div>
                          <div class="item">
                            <i class="fa fa-2x fa-film text-primary-lighter"></i>
                          </div>
                        </div>
                      </a>
                      @endif
                    @endforeach
                 
                   
              @endforeach

            @endif
               
           
              
              
            </div>


           
              
             
                </div>
            
        </div>
      </div>
    </div>
  </div>


<!-- Slide Left Block Modal chack suppressions -->
  <div class="modal fade" id="d-{{$atelier->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
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
            <h4 class=" text-bold ">Atelier : <span class="badge bg-danger">{{$atelier->name}}</span> Will be deleted</h4>
          </div>
          <form action="{{route('admin.atelier.delete')}}" method="POST">
              <div class="block-content">
                @csrf
                    <input type="hidden" name="id" value="{{$atelier->id}}" class="form-control">
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
</div>
{{ $ateliers->links() }}
<!-- END Checkable Table -->
@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>Dashmix.helpersOnLoad(['dm-table-tools-checkable', 'dm-table-tools-sections', 'jq-select2',]);</script>
@endpush