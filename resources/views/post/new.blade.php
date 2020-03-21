@extends('layouts.app')
@section('content')
<div class="panel-body">



<div class="d-flex flex-column align-items-center mt-3">
  <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
    <div class="card">
      <div class="card-header">
        Post Screen
      </div>
      <div class="card-body">
        <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ url('posts')}}" accept-charset="UTF-8" method="POST">
        {{csrf_field()}} 
          <div class="form-group row mt-2">
            <div class="col-auto pr-0">
              <img class="post-profile-icon round-img" src="{{ asset('storage/user_images/' . Auth::user()->id . '.jpg') }}"/>
            </div>
            <div class="col pl-0">
              <input class="form-control border-0" placeholder="Shop name" type="text" name="shop_name" value="{{ old('list_name') }}"/>
            </div>
            <div class="col pl-0">
            　<select class="form-control border-0" name="shop_type" value="{{ old('shop_type') }}" />
            　<option>Japanese Food</option>
            　<option>Chinese Food</option>
            　<option>French Food</option>
            　<option>Italian Food</option>
    　　　　　　　</select>
            </div>
          </div>
          <div class="mb-3">
            <input type="file" name="photo" accept="image/jpeg,image/gif,image/png" />
          </div>
          <input type="submit" name="commit" value="Post" class="btn btn-primary" data-disable-with="投稿する" />
</form>      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#post_image').bind('change', function() {
    var size_in_megabytes = this.files[0].size/1024/1024;
    if (size_in_megabytes > 1) {
      alert('ファイルサイズの最大は1MBまでです。違う画像を選んでください。');
    }
  });
</script>
@endsection

