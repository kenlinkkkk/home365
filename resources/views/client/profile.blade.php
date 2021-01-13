@extends('layouts.app')

@section('title')
    <title>Thông tin cá nhân</title>
@endsection

@section('content')
    <div class="container mt-8 mb-8">
        <div class="row mt-4 mb-4">
            <h2>Thông tin thuê bao</h2>
        </div>
        <div class="row mt-4 mb-4 table-responsive">
            <h4>Danh sách các gói đang sử dụng</h4>
            <p>Thuê bao: {{ '0'. substr(session()->get('_user')['msisdn'], -9) }}</p>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên gói</th>
                    <th class="text-right">Giá cước</th>
                </tr>
                </thead>
                <tbody>
                @foreach($packages as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $key->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
