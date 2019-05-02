


 <div class="container marketing">
        <div class="row">
          @foreach($publicacao as $publicacoes)
          @if($publicacoes->situacao == 1)
          <div class="col-lg-4">
            <img src="{{asset('uploads/' . $publicacoes->arquivo)}}"  alt="{{'uploads/' . $publicacoes->arquivo}}" width="300" height="400">
            <h2>Titulo: {{$publicacoes->title}}</h2>
            <p>Descrição: {{$publicacoes->description}}</p>
          </div><!-- /.col-lg-4 -->
          @endif
          @endforeach
        </div>
