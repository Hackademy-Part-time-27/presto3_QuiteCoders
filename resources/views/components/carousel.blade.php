<div class="corpo">
  <div class="carousel" id="test1">
  @foreach($images as $image)
    <input class="input " type="radio" name="item" value="1" checked>
    
    <div>
      <img src="{{ $image->getUrl(400,267) }}">
    </div>
    @endforeach

  </div>

</div>

