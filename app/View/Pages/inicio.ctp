
<div id="header">
  <div class="navigation">
    <div class="contenedor">
      <div class="logo">
          <a href="{base_url}home"><img src="{base_url}img/clubdedanza.png" alt=""></a>
      </div>
      
      <div class="buscador">
        <form action="{base_url}search" method="post">
          <input type="search" x-webkit-speech name="search"> <input type="submit" value="Buscar">
        </form> 
      </div>
      {logBox}
      <ul class="menu">
        <!-- <li class="selected"><a href="{base_url}home">INICIO</a></li> -->
        <!-- <li><a href="{base_url}about">Club</a></li> -->
        <li><a href="{base_url}lista-de-artistas" {artistsSelected} class="selected" {/artistsSelected}>Artistas</a></li>
        <li><a href="{base_url}entrevistas" {interviewsSelected} class="selected" {/interviewsSelected}>Notas</a></li>
        <li><a href="{base_url}proximamente" {auditionsSelected} class="selected" {/auditionsSelected}>Audiciones y convocatorias</a></li><?php /*link viejo {base_url}audiciones*/ ?>
        <li><a href="{base_url}proximamente" {classifiedSelected} class="selected" {/classifiedSelected}>Clasificados</a></li><?php /*link viejo {base_url}clasificados*/ ?>
        <li><a href="{base_url}proximamente" {coursesSelected} class="selected" {/coursesSelected}>Cursos y talleres</a></li><?php /*{base_url}cursos-ylink viejo -talleres*/ ?>
        <li><a href="{base_url}proximamente" {entertainmentSelected} class="selected" {/entertainmentSelected} >Cartelera</a></li><?php /*link viejo {base_url}entretenimiento*/ ?>
        <li><a href="{base_url}proximamente" {mapSelected} class="selected" {/mapSelected} >Mapa de la danza</a></li><?php /*{base_url}mapa-de-llink viejo a-danza*/ ?>
      </ul>
    </div>
  </div>
</div>