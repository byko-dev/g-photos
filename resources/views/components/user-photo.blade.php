@props(['photo', 'size'])

<div class="logo_container">
    <div class="logo_preview logo_{{$size}}_size"
         style="{{$photo ? 'background-image: url(' . asset('storage/' . $photo) . ');': "background: rgba(218, 220, 225, 0.5);"}}">
        <img src="{{$photo ? "": asset("assets/user.png")}}" alt=""/>
    </div>
</div>
