@extends('admin.layouts.master')

@section('content')
<div class="mb-4">
    <div class="row">
      <div class=" mb-4 col-md-6 col-xl-4">
        <a data-bs-toggle="modal" data-bs-target="#add-type" class="block block-rounded block-transparent block-link-pop bg-gd-fruit h-100 mb-0" href="javascript:void(0)">
          <div class="block-content block-content-full d-flex align-items-center justify-content-between">
            <div>
              <p class="fs-lg fw-semibold mb-0 text-white">
                اضافة موضوع
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
  
      {{-- <div class=" mb-4 col-md-6 col-xl-4">
        <a  data-bs-toggle="modal" data-bs-target="#modal-block-slideleft" class="block block-rounded block-transparent block-link-pop bg-gd-sea h-100 mb-0" href="javascript:void(0)">
          <div class="block-content block-content-full d-flex align-items-center justify-content-between">
            <div>
              <p class="fs-lg fw-semibold mb-0 text-white">
                Ajouter une atteliers
              </p>
              <p class="text-white-75 mb-0">
                {{-- UI Design --}}
              {{-- </p>
            </div>
            <div class="ms-3 item">
              <i class="fa fa-2x fa-vector-square text-white-50"></i>
            </div>
          </div>
        </a>
      </div>
      --}}
      
    </div>
  </div>
  
  
  <div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">القائمة</h3>
    {{-- <button type="button" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#modal-block-slideleft">Ajouter une subject</button> --}}
    {{-- <button type="button" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#add-type">Ajouter un type</button> --}}
    <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#delete-all">حدف الكل</button>
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
            <h3 class="block-title"> اضافة موضوع</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
              </button>
            </div>
          </div>
          <form action="{{route('admin.subjects.add')}}" method="POST" enctype="multipart/form-data">
              <div class="block-content">
                @csrf

                <div class="mb-4">
                  <label for="">المواد </label>
                  <select name="mawad_id" class="form-select" id="">
                    <option value="-">-</option>
                    @foreach ($mawads as $mawad)
                        <option value="{{$mawad->id}}">{{$mawad->name}}</option>
                    @endforeach
                  </select>
              </div>
               
              <div class="mb-4">
                  <label for="">النوع </label>
                  <select name="type_id" class="form-select" id="">
                    <option value="-">-</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                  </select>
              </div>


                <div class="mb-4">
                    <label for="">الاسم </label>
                    <input type="text" name="name" class="form-control">
                </div>


                <div class="mb-4">
                  <label for="">الملف </label>
                  <input type="file" name="file" class="form-control">
              </div>

              <div class="mb-4">
                <label for="">العام </label>
                <input type="number" min="2000" max="2099" value="2022" step="1" name="year" class="form-control">
            </div>
             </div>
          <div class="block-content block-content-full text-end bg-body">
            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">غلق</button>
            <button type="submit" class="btn btn-sm btn-success" >حفظ</button>
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
              <h3 class="block-title">خل انت متأكد</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                  <i class="fa fa-fw fa-times"></i>
                </button>
              </div>
            </div>
            <div class="block-content text-center ">
              <h4 class=" text-bold ">سيتم جدف كل المواضيع</h4>
            </div>
            <form action="{{route('admin.subjects.delete.all')}}" method="POST">
              @csrf
            <div class="block-content block-content-full text-end bg-body">
              <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">اغلاق النافدة</button>
              <button type="submit" class="btn btn-sm btn-danger" >حدف</button>
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
            <th lass="d-none d-sm-table-cell">الرقم</th>
            <th lass="d-none d-sm-table-cell">الاسم</th>
            <th lass="d-none d-sm-table-cell">المواد</th>
            <th lass="d-none d-sm-table-cell">النوع</th>
            <th lass="d-none d-sm-table-cell">الملف</th>
            <th lass="d-none d-sm-table-cell">العام</th>
            <th class="d-none d-sm-table-cell" style="width: 20%;">الناريخ</th>
            <th class="d-none d-sm-table-cell" style="width: 15%;">اعدادات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($subjects as $subject)
          <tr>
            <td class="text-center">
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="checkbox" value="" id="row_1" name="row_1">
                <label class="form-check-label" for="row_1"></label>
              </div>
            </td>
            <td class="d-none d-sm-table-cell">
              <p class="fw-semibold mb-1">
                    #{{ $subject->id }}
            </p>
            </td>
            
            <td class="d-none d-sm-table-cell">
                <span class="">{{ $subject->name }}</span>
              </td>
              <td>{{ $subject->mawad->name }}</td>
              <td class="d-none d-sm-table-cell">
                <span class="">{{ $subject->type->name }}</span>
              </td>
              <td>
                <a class="btn btn-alt-primary" href="{{ asset("public/file/".$subject->file) }}" download>تحميل</a>
              </td>
              <td>{{ $subject->year }}</td>
            
            <td class="d-none d-sm-table-cell">
              <em class="fs-sm text-muted">{{ $subject->created_at->diffForHumans() }}</em>
            </td>
            <td class="d-none d-sm-table-cell">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#e-{{$subject->id}}">تعديل</button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#d-{{$subject->id}}">حدف</button>
            </td>
          </tr>
          
  
           <!-- Slide Left Block Modal chack suppressions -->
           <div class="modal fade" id="e-{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">هل انت متأكد؟</h3>
                    <div class="block-options">
                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="block-content text-center ">
                    <h4 class=" text-bold "> <span class="badge bg-danger">{{$subject->name}}</span> سيتم تعديل</h4>
                </div>
                <form action="{{route('admin.subjects.update')}}" method="POST" enctype="multipart/form-data">
                  <div class="block-content">
                    @csrf
                    <span class="badge bg-info">{{$subject->mawad->name}}</span>
                    <div class="mb-4">
                     
                      <label for="">المواد : </label>
                      <select name="mawad_id" class="form-select" id="">
                        <option value="-">-</option>
                        @foreach ($mawads as $mawad)
                            <option value="{{$mawad->id}}">{{$mawad->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <span class="badge bg-info">{{$subject->type->name}}</span>
                  <div class="mb-4">
                    
                    
                      <label for="">النوع </label>
                      <select name="type_id" class="form-select" id="">
                        <option value="-">-</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                      </select>
                  </div>
    
    
                    <div class="mb-4">
                      <label for="">الاسم </label>
                      <input type="hidden" name="id" value="{{$subject->id}}" class="form-control">
                      <input type="text" name="name" value="{{$subject->name}}" class="form-control">
                    </div>
    
    
                    <div class="mb-4">
                      <label for="">الملف : </label>
                      <input type="file" name="file" class="form-control">
                  </div>
    
                  <div class="mb-4">
                    <label for="">العام </label>
                    <input type="number" min="2000" max="2099" value="{{$subject->year}}" step="1" name="year" class="form-control">
                </div>
                 </div>
              <div class="block-content block-content-full text-end bg-body">
                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">غلق</button>
                <button type="submit" class="btn btn-sm btn-success" >حفظ</button>
              </div>
              </form>
                </div>
            </div>
            </div>
        </div>
  
  
  
      
  
  
  <!-- Slide Left Block Modal chack suppressions -->
    <div class="modal fade" id="d-{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft" aria-hidden="true">
      <div class="modal-dialog modal-dialog-slideleft" role="document">
        <div class="modal-content">
          <div class="block block-rounded block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
              <h3 class="block-title">هل انت متأكد</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                  <i class="fa fa-fw fa-times"></i>
                </button>
              </div>
            </div>
            <div class="block-content text-center ">
              <h4 class=" text-bold "><span class="badge bg-danger">{{$subject->name}}</span> سيتم حدف </h4>
            </div>
            <form action="{{route('admin.subjects.delete')}}" method="POST">
                <div class="block-content">
                  @csrf
                      <input type="hidden" name="id" value="{{$subject->id}}" class="form-control">
               </div>
            <div class="block-content block-content-full text-end bg-body">
              <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">غلق</button>
              <button type="submit" class="btn btn-sm btn-danger" >حدف</button>
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
  {{ $subjects->links() }}
  <!-- END Checkable Table -->
@endsection