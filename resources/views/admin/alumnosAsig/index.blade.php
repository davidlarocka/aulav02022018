@extends('template_n.main')

@section('title', 'Asignaturas')

@section('content')
<style>
.selector {
  position: absolute;
  left: 50%;
  width: 140px;
  height: 140px;
  margin-top: -500px;
  margin-left: -70px;
}
</style>
<div class="title"><h3 style="text-align: right;">{{ ucfirst($datos[0]->grupo) }}</h3></div>

<div class="container">
  @include('flash::message')
</div>

<select name="asignaturas" id="asignaturas" onchange="asignatura()">
  <option value="0" selected>Seleccione una asignatura...</option>  
  @foreach($datos as $dato)
    <option value="{{ $dato->id }}-{{ ucfirst($dato->asignatura) }}">{{ ucfirst($dato->asignatura) }}</option>         
  @endforeach
</select>

<div id="materia_id"></div>

<div id="selector" class='selector open'>
  <ul>
    @foreach($publicaciones as $publicacion)
      <li>
        <input id='c{{ $publicacion->id }}' type='checkbox'>
        <label for='c{{ $publicacion->id }}'class="fa fa-pencil fa" onclick="ir({{ $publicacion->id }})"><p>{{ ucfirst($publicacion->descripcion) }}</p></label>
      </li>
    @endforeach
  </ul>
  <button id="btitulo" style="background:#68dff0;">Asignatura no seleccionada</button>

</div>
<input id='cerrado' type='hidden'>

<script src="{{ URL::to('/') }}/js/jquery-3.2.1.min.js"></script>

<script>
  function ir(valor){    
    switch(valor){
      case 1:
        location.href = "{{ URL::to('/') }}/admin/capsulas/"+valor;
        break;
      case 2:
        location.href = "{{ URL::to('/') }}/admin/proyectos/"+valor;
        break;
      case 3:
        location.href = "{{ URL::to('/') }}/admin/materialhs/"+valor;
        break;
      case 4:
        location.href = "{{ URL::to('/') }}/admin/materialcs/"+valor;
        break;
      case 5:
        location.href = "{{ URL::to('/') }}/admin/guias/"+valor;
        break;    
    }
        
  }

  function asignatura(){
      var asig = document.getElementById('asignaturas').value;
          res = asig.split("-");
          selector = document.getElementById('selector');
          materia_id = document.getElementById('materia_id');
          materia_id.innerHTML="<div id='materia_id'></div>";
          btitulo=document.getElementById('btitulo');

      if(asig=="0"){
        btitulo.innerHTML = "Seleccione una asignatura";
        if ($(selector).hasClass('selector open')){
          document.getElementById("btitulo").click();        
        }        
      }else{
        btitulo.innerHTML = res[1];
        selector.style.display='block';
        materia_id.innerHTML="<div id='materia_id'><input id='m_id' type='hidden' value="+res[0]+"></div>";
        if (selector.className!="selector open"){
          document.getElementById("btitulo").click();
        }
      }
  }

</script>

<script>

  var items = document.querySelectorAll('.circle a');

  for(var i = 0, l = items.length; i < l; i++) {
    items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
    
    items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
  }
  
</script>

<script>
var nbOptions = 8;
var angleStart = -360;

// jquery rotate animation
function rotate(li,d) {
    $({d:angleStart}).animate({d:d}, {
        step: function(now) {
            $(li)
               .css({ transform: 'rotate('+now+'deg)' })
               .find('label')
                  .css({ transform: 'rotate('+(-now)+'deg)' });
        }, duration: 0
    });
}

// show / hide the options
function toggleOptions(s) {
    $(s).toggleClass('open');
    var li = $(s).find('li');
    var deg = $(s).hasClass('half') ? 180/(li.length-1) : 360/li.length;
    for(var i=0; i<li.length; i++) {
        var d = $(s).hasClass('half') ? (i*deg)-90 : i*deg;
        $(s).hasClass('open') ? rotate(li[i],d) : rotate(li[i],angleStart);
    }

}

$('.selector button').click(function(e) {
    toggleOptions($(this).parent());
});


$('#guardar_curso').click(function(e) {
   alert("--->");
});

setTimeout(function() { toggleOptions('.selector'); }, 100);//@ sourceURL=pen.js
</script>

@endsection