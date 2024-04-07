<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf" content="{{ csrf_token() }}" />
    <title>Document</title>
    @include('main.link')
</head>
<body>
  @include('main.sidebar')
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <h2>Contact Us</h2>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif
        
            <form action="/store" method="Post" enctype="multipart/form-data">
                @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Your Phone No</label>
                <input type="text" class="form-control"  name="phone">
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">City</label>
                <input type="text" class="form-control"  name="city">
                @error('city')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label  class="form-label">Choose Image</label>
                <input type="file" id="input-file" class="form-control"  name="file" accept="image/png, image/gif, image/jpeg" />
                @error('file')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div>
                <img src="#" id="preview-image" alt="">
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="comment" rows="5"></textarea>
                @error('comment')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
</body>
@include('main.script')
</html>

