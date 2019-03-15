<div class="form-group">
    <label for="">Nombre</label>
    <input value="@isset($trainer->name){{$trainer->name}}@endisset" type="text" class="form-control" name="name">
</div>
<div class="form-group">
    <label for="">Avatar</label>
    @isset($trainer->avatar)
    <img style="background-color:#efefef;border-radius:50%; height:120px; width:120px; margin: 10px auto;" class="card-img-top" src="/images/{{$trainer->avatar}}" alt="Card image cap">
    @endisset
    <input type="file" class="form-control" name="avatar">
</div>
<div class="form-group">
    <label for="">Description</label>
    <input value="@isset($trainer->description){{$trainer->description}}@endisset" type="text" class="form-control" name="description">
</div> 