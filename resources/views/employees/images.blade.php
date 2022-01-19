@foreach($imgFiles as $img)
  <img src="{{ url('/getFile', ['path' => $img]) }}" />
 @endforeach