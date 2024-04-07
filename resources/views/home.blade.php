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
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="/api/add-user" method="POST" enctype="multipart/form-data">
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
                  <label for="phone" class="form-label">Your Phone No</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                  @error('phone')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="mb-3">
                  <label class="form-label">City</label>
                  <input type="text" class="form-control" id="city" name="city">
                  @error('city')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="img_name" class="form-label">Choose Image</label>
                  <input type="file" class="form-control" name="img_name[]" multiple accept="image/png, image/jpeg, image/*"/>              
                  @error('img_name')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
              <div>
                  <img src="#" id="preview-image" alt="" style="object-fit: contain; max-width:100%;">
              </div>
              <div class="mb-3">
                  <label for="comment" class="form-label">Message</label>
                  <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
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

<script>
  $(document).ready(function() {
      $('#contactForm').submit(function(e) {
          e.preventDefault(); // Prevent default form submission

          // Get form data
          var formData = $(this).serialize();

          // AJAX POST request
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: formData,
              success: function(response) {
                  // Handle success, e.g., show a success message
                 alert('Form submitted successfully');
                  // console.log(response); // You can handle the response here
              },
              error: function(error) {
                  // Handle errors, e.g., show an error message
                 alert('Form submission error');
                  // console.error(error); // You can handle the error response here
              }
          });
      });
  });
</script>
</html>

