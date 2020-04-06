
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="{{asset('js/crud.js')}}"></script> -->
        
      <!-- <div class="modal-body"> -->
            <form id="image_form" method="post" enctype="multipart/form-data" action="{{url('crud/update',$product->id)}}">
            @method('PATCH') 
            @csrf
            <label>Product Name</label>
            <input class="form-control" type="text" name="title" value='{{$product->title}}'><br>
            <label>Select Image</label><br>
            <input type="file" name="image" id="image" value="{{$product->image}}"/><br />
            <img class="card-img-top" src="/images/{{$product->image}}" alt="Card image cap" id="blah" style="width:12rem;width:18rem;">
            <input type="hidden" name="action" id="action" value="insert" /><br>
            <input type="hidden" name="image_id" id="image_id" value="{{$product->image}}" />
            <!-- <div id="image_data"></div><br>
            <span id="uploaded_image"></span> -->
            <label for="formControlRange">Select the Price</label>
            <input class="form-control" type="number" value="{{$product->price}}" name="price">
            <input class="form-control" type="text" placeholder="Add Description" name="description" value="{{$product->description}}">
            <!-- <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />   -->
            <a href="{{url('/')}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button></a>
            <button type="submit" class="btn btn-primary" value="Edit" id="edit" name="edit">Update</button>
            </form>
        <!-- </div> -->
        <script>
          function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#image").change(function() {
  readURL(this);
});
          </script>
