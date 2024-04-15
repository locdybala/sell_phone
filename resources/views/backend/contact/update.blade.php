@extends('backend.admin_layout')
@section('content')
    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white;
        }

        .label-info {
            background-color: #5bc0de;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang chủ/</span> Sửa thông tin website</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-12">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Sửa thông tin website</h5>
                    </div>
                    @php
                        $success=Session::get('success');
                        if($success){
                        echo '<div class="alert alert-success">
                             '.$success.'
                           </div>';
                        Session::put('success', null);}
                    @endphp
                    <div class="card-body">
                        <form action="{{route('update_info',['id'=>$contact->info_id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Thông tin liên hệ</label>
                                <div class="col-sm-10">
                                    <textarea
                                        id="ckeditor"
                                        class="form-control" name="info_name"
                                        placeholder=""
                                    >{!! $contact->info_contact !!}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Bản đồ</label>
                                <div class="col-sm-10">
                                  <textarea rows="6" cols="60"
                                      class="form-control" name="info_map"
                                      placeholder="Mô tả sản phẩm"
                                  >{{ $contact->info_map }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Ảnh Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="basic-default-name" name="image"
                                    />
                                    <img class="input-rounded mt-2" src="{{ URL::to('/upload/info/'.$contact->info_image) }}" height="150" width="150" alt="">

                                </div>
                            </div>


                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic with Icons -->
    </div>
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');

    </script>
@endsection
