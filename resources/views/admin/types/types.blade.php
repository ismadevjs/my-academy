@extends('admin.layouts.master')

@section('content')
    <div class="mb-4">
        <div class="row">
            <div class=" mb-4 col-md-6 col-xl-4">
                <a data-bs-toggle="modal" data-bs-target="#add-type"
                    class="block block-rounded block-transparent block-link-pop bg-gd-lake h-100 mb-0"
                    href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="fs-lg fw-semibold mb-0 text-white">
                                اضافة نوع
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
            {{-- <button type="button" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#modal-block-slideleft">Ajouter une type</button> --}}
            {{-- <button type="button" class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#add-type">Ajouter un type</button> --}}
            <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#delete-all">حدف الكل</button>
            <div class="block-options">
                <div class="block-options-item">
                </div>
            </div>
        </div>
        <!-- Slide Left Block Modal -->
        <div class="modal fade" id="add-type" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">اضافة نوع</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('admin.types.add') }}" method="POST" enctype="multipart/form-data">
                            <div class="block-content">
                                @csrf

                                <div class="mb-4">
                                    <label for="">المواد </label>
                                    <select name="mawad_id" class="form-select" id="">
                                        <option value="-">-</option>
                                        @foreach ($mawads as $mawad)
                                            <option value="{{ $mawad->id }}">{{ $mawad->name }}
                                                ({{ $mawad->sanawatss->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-4">
                                    <label for="">الاسم :  </label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="block-content block-content-full text-end bg-body">
                                <button type="button" class="btn btn-sm btn-alt-secondary"
                                    data-bs-dismiss="modal">غلق</button>
                                <button type="submit" class="btn btn-sm btn-success">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Slide Left Block Modal -->





        <!-- Slide Left Block Modal -->
        <div class="modal fade" id="delete-all" tabindex="-1" role="dialog" aria-labelledby="modal-block-slideleft"
            aria-hidden="true">
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
                            <h4 class=" text-bold ">سيتم حدف الكل</h4>
                        </div>
                        <form action="{{ route('admin.types.delete.all') }}" method="POST">
                            @csrf
                            <div class="block-content block-content-full text-end bg-body">
                                <button type="button" class="btn btn-sm btn-alt-secondary"
                                    data-bs-dismiss="modal">غلق</button>
                                <button type="submit" class="btn btn-sm btn-danger">حدف</button>
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
                                    <input class="form-check-input" type="checkbox" value="" id="check-all"
                                        name="check-all">
                                    <label class="form-check-label" for="check-all"></label>
                                </div>
                            </th>
                            <th lass="d-none d-sm-table-cell">الرقم</th>
                            <th lass="d-none d-sm-table-cell">الاسم</th>
                            <th lass="d-none d-sm-table-cell">المواد</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">التاريخ</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td class="text-center">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="checkbox" value="" id="row_1"
                                            name="row_1">
                                        <label class="form-check-label" for="row_1"></label>
                                    </div>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <p class="fw-semibold mb-1">
                                        #{{ $type->id }}
                                    </p>
                                </td>

                                <td class="d-none d-sm-table-cell">
                                    <span class="">{{ $type->name }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="">{{ $type->mawad->name }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="fs-sm text-muted">{{ $type->created_at->diffForHumans() }}</em>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#e-{{ $type->id }}">تعديل</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#d-{{ $type->id }}">حدف</button>
                                </td>
                            </tr>


                            <!-- Slide Left Block Modal chack suppressions -->
                            <div class="modal fade" id="e-{{ $type->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal-block-slideleft" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-slideleft" role="document">
                                    <div class="modal-content">
                                        <div class="block block-rounded block-themed block-transparent mb-0">
                                            <div class="block-header bg-primary-dark">
                                                <h3 class="block-title">هل انت متأكد</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content text-center ">
                                                <h4 class=" text-bold ">النوع <span
                                                        class="badge bg-danger">{{ $type->name }}</span> سيتم الحدف
                                                </h4>
                                            </div>
                                            <form action="{{ route('admin.types.update') }}" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="block-content">
                                                    @csrf


                                                    <div class="mb-4">
                                                        <span> {{ $type->mawad->name }} المواد  </span>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="">المواد </label>
                                                        <select name="mawad_id" class="form-select" id="">
                                                            <option value="-">-</option>
                                                            @foreach ($mawads as $mawad)
                                                                <option value="{{ $mawad->id }}">{{ $mawad->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="">الاسم </label>
                                                        <input type="hidden" name="id" value="{{ $type->id }}"
                                                            class="form-control">
                                                        <input type="text" name="name" value="{{ $type->name }}"
                                                            class="form-control">
                                                    </div>

                                                </div>
                                                <div class="block-content block-content-full text-end bg-body">
                                                    <button type="button" class="btn btn-sm btn-alt-secondary"
                                                        data-bs-dismiss="modal">غلق</button>
                                                    <button type="submit" class="btn btn-sm btn-success">حفظ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <!-- Slide Left Block Modal chack suppressions -->
                            <div class="modal fade" id="d-{{ $type->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="modal-block-slideleft" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-slideleft" role="document">
                                    <div class="modal-content">
                                        <div class="block block-rounded block-themed block-transparent mb-0">
                                            <div class="block-header bg-primary-dark">
                                                <h3 class="block-title">هل انت متأكد</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content text-center ">
                                                <h4 class=" text-bold ">النوع <span
                                                        class="badge bg-danger">{{ $type->name }}</span> سيتم الحدف
                                                </h4>
                                            </div>
                                            <form action="{{ route('admin.types.delete') }}" method="POST">
                                                <div class="block-content">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $type->id }}"
                                                        class="form-control">
                                                </div>
                                                <div class="block-content block-content-full text-end bg-body">
                                                    <button type="button" class="btn btn-sm btn-alt-secondary"
                                                        data-bs-dismiss="modal">غلق</button>
                                                    <button type="submit" class="btn btn-sm btn-danger">حدف</button>
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
    {{ $types->links() }}
    <!-- END Checkable Table -->
@endsection
