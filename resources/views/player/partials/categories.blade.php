
<!-- Categorias de Playlist -->
<ul id="playlists" style="display:none;">
    
    {{-- Renderizado de $categorias proveniente de playercontroller --}}
    @foreach($categorias as $cat)
        <li data-source={{ 'playlist_'.$cat -> genre }} data-playlist-name={{ strtoupper($cat -> genre) }} data-thumbnail-path="{{ asset('content/thumbnails/p-html.jpg') }}">
            <p class="fwduvp-categories-title"><!--<span class="fwduvp-header">Title: </span>--><span class="fwduvp-title">{{ $cat -> genre }}</span></p>
            <p class="fwduvp-categories-type"><span class="fwduvp-header">Tipo: </span>LiveTV</p>
            <p class="fwduvp-categories-description"><span class="fwduvp-header">Descripcion: </span>Canales Nacionales de El Salvador</p>
        </li>
    @endforeach

</ul>