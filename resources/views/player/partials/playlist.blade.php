
{{-- Para cada categorias --}}
@foreach($categorias as $cat)
    
    <ul id={{ 'playlist_'.$cat -> genre }} style="display:none;">	
    {{-- Se renderiza sus Canales --}}
    @foreach ($cat->list as $list)
       
        <li data-thumb-source={{ asset('posters/'.$list -> image ) }} data-video-source={{ $list -> streaming_url_app }} data-poster-source="{{ asset('content/posters/hls-poster.jpg') }}" data-downloadable="yes">
            <div data-video-short-description="">
                <div>
                    <p class="fwduvp-thumbnail-title">{{ $list -> name }}</p>
                    <!-- 
                        <p class="fwduvp-thumbnail-description">Canal 2 de El Salvador </p>
                    -->
                </div>
            </div>
        </li>
        
    @endforeach
    
    </ul>
@endforeach



