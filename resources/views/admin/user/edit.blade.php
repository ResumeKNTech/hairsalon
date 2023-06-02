@extends('admin.master')
@section('module','Chỉnh Sửa ')
@section('action','Barber')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('administrator/dist/css/img.css')}}">
@endpush


@section('content')
<div class="card">
    <form action="{{route('admin.user.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa barber</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Bạn Là :</label>
                <select name="level" id="" class="form-control">
                    <option value="1" {{$user->level==1?"selected":""}}>Barber</option>
                    <option value="2" {{$user->level==2?"selected":""}}>Manager</option>
                </select>
                @error('level')
                    <span style="color: red">!!!{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Họ Và Tên</label>
                <input type="text" class="form-control" name="name" placeholder="Nguyen Van A" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số Điện Thoại</label>
                <input type="text" class="form-control" name="phone" placeholder="0123456789" value="{{$user->phone}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="">Mật Khẩu</label>
                <input type="password" class="form-control" name="password" id="" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="">Nhập lại Mật Khẩu</label>
                <input type="password" class="form-control" name="confirm"  id="" placeholder="Password">
                @error('confirm')
                    <span style="color: red">!!!{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giới Tính</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="1" {{$user->gender=='1'?'checked':''}}>
                        <label class="form-check-label mr-5">Male</label>
                        
                        <input class="form-check-input " type="radio" name="gender" value="2" {{$user->gender=='2'?'checked':''}}>
                        <label class="form-check-label ">Female</label>
                    </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Chuyên mục</label>
                <div class="form-check">
                    @foreach($categories as $item)
                        <input class="form-check-input" type="checkbox" name="category[]"  {{ in_array($item->id, $active_category) ? "checked" : "" }} value="{{ $item->id }}">
                        <label class="form-check-label mr-5">{{ $item->category }}</label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="">Ảnh</label>
                <div><img class="avatar" width="100" src="{{asset('upload')}}/{{$user->file}}" alt=""></div>
            </div>
            <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            
            
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" value="Update">Update</button>
        </div>
        <!-- /.card-footer-->
    </form>
</div>
<!-- /.card -->
@endsection
