<div class="caro">
<ul class="accordion">
  @foreach($images as $image)

      <li>
        <img src="{{ $image->getUrl(400,300) }}" />
        <div class="content">
          <span>
          </span>
        </div>
      </li>
      @endforeach
    </ul>
</div>