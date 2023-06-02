<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Đăng Ký Tài Khoản</title>
  <link rel="stylesheet" type="text/css" href="{{asset('administrator/dist/css/stylelogin.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>

<body>
  
<div id="form">
  <div class="container">
    <div class="login-page">
        <div class="khung">
        <form action="{{route('signin')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Bạn Là :</label>
              <select name="level" id="">
                  <option value="1">Barber</option>
                  <option value="2">Admin</option>
              </select>
            </div>
          <div class="form-group">
            <label>Họ và Tên<span class="req">*</span> </label>
            <input type="text" class="form-control" required name="name">
            <p class="help-block text-danger"></p>
            @error('name')
              <p> !!Vui lòng nhập tên</p>
            @enderror
          </div>
          <div class="form-group">
            <label> Số Điện Thoại<span class="req">*</span> </label>
            <input type="tel" class="form-control" required name="phone">
            <p class="help-block text-danger"></p>
            @error('phone')
               <p style="color: red">!! Số điện thoại đã trùng</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Email<span class="req">*</span> </label>
            <input type="email" class="form-control" required name="email">
            <p class="help-block text-danger"></p>
            @error('email')
               <p style="color: red"> !!Email đã tồn tại</p>
            @enderror
          </div>
          <div class="form-group">
            <label> Mật Khẩu<span class="req">*</span> </label>
            <input type="password" class="form-control" required name="password">
            <p class="help-block text-danger"></p>
          </div>
          <div class="form-group">
            <label>Nhập Lại Mật Khẩu<span class="req">*</span> </label>
            <input type="password" class="form-control" required name="confirm">
            <p class="help-block text-danger"></p>
          </div>
          <div class="form-group">
            <div class="gender">*Giới Tính
                <div class="form-gender"><input  type="radio" name="gender" checked="" value="1" id="nam">Nam</div>
                <div class="form-gender"><input  type="radio" name="gender" value="2" id="nu">Nữ</div>
            </div>
            <p class="help-block text-danger"></p>
          </div>
          <div class="form-group">
            <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" required id="exampleInputFile" name="file">
                </div>
                <div class="input-group-append">
                </div>
              </div>
          </div>
          <div class="mrgn-30-top">
            <button type="submit" class="btn btn-larger btn-block">
            Sign up
            </button>
            <p class="message">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng nhập</a></p>
          </div>
        </form>
        </div>
    </div>
  </div>
  <!-- /.container --> 
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
<!-- partial -->
  <script  src="{{asset('script.js')}}"></script>
</body>
</html>
