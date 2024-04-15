@extends('layout')
@section('content')
    <div class="col-sm-12 padding-right">
        <div class="features_items">
            <!--features_items-->
            <h2 class="title text-center">Liên hệ với chúng tôi</h2>
            <div class="row">
                <div class="col-md-12">
                    {!! $contact->info_contact !!}
                </div>
                <div class="col-md-12">
                    <h4>Bản đồ</h4>
                    {!! $contact->info_map!!}
                </div>
            </div>
        </div>
        <!--features_items-->
    </div>
@endsection

