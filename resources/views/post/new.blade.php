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
            <div class="col-auto pr-0">
              <input class="form-control border-0" placeholder="Shop name" type="text" name="shop_name" value="{{ old('list_name') }}"/>
            </div>
          </div>
          <div class="mb-3">
            <input type="file" name="photo" accept="image/jpeg,image/gif,image/png" />
          </div>
          <div class="mb-3">
            <select class="form-control border-0" name="shop_type" value="{{ old('shop_type') }}" />
            　<option>北海道</option>
              <option>青森県</option>
              <option>岩手県</option>
              <option>宮城県</option>
              <option>秋田県</option>
              <option>山形県</option>
              <option>福島県</option>
              <option>茨城県</option>
              <option>栃木県</option>
              <option>群馬県</option>
              <option>埼玉県</option>
              <option>千葉県</option>
              <option>東京都</option>
              <option>神奈川県</option>
              <option>新潟県</option>
              <option>富山県</option>
              <option>石川県</option>
              <option>福井県</option>
              <option>山梨県</option>
              <option>長野県</option>
              <option>岐阜県</option>
              <option>静岡県</option>
              <option>愛知県</option>
              <option>三重県</option>
              <option>滋賀県</option>
              <option>京都府</option>
              <option>大阪府</option>
              <option>兵庫県</option>
              <option>奈良県</option>
              <option>和歌山県</option>
              <option>鳥取県</option>
              <option>島根県</option>
              <option>岡山県</option>
              <option>広島県</option>
              <option>山口県</option>
              <option>徳島県</option>
              <option>香川県</option>
              <option>愛媛県</option>
              <option>高知県</option>
              <option>福岡県</option>
              <option>佐賀県</option>
              <option>長崎県</option>
              <option>熊本県</option>
              <option>大分県</option>
              <option>宮崎県</option>
              <option>鹿児島県</option>
              <option>沖縄県</option>
    　　　　　　　</select>
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

