<x-tela-layout>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Cultos</li>
        </ol>
        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Data</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Lista de comparecimento</th>
                    <th scope="col">Presentes - Ausentes</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cultos as $culto)
                <tr>
                    {{-- <th scope="row">{{$culto->id}}</th> --}}
                    <td id="data-{{$culto->id}}" style="{{$culto->ativo == 0 ? 'text-decoration:line-through' : ''}}">
                        {{\Carbon\Carbon::parse($culto->data)->format('d/m/Y')}}
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-{{$culto->dia == 'domingo'? 'warning text-dark':($culto->dia =='terça'?'info text-dark' :'secondary')}}">
                            {{$culto->dia == 'domingo'? 'domingo':($culto->dia =='terça'?'terça' :'sabado')}}
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-outline-success btn-sm" href="{{route('culto.listacomparecimento',[$culto->data,$culto->dia])}}">Visualizar</a>
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-success">
                            {{$culto->presentes}}
                        </span>
                            -
                        <span class="badge rounded-pill bg-danger">
                            {{$culto->ausentes}}
                        </span>
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-{{$culto->ativo == 1?'success':'danger'}}" id="ativo-{{$culto->id}}">
                            {{$culto->ativo == 1?'houve':'não houve'}}
                        </span>
                    </td>
                    <td>
                        {{-- <button type="button" class="btn btn-outline-primary btn-sm">Editar</button>
                        @if ($culto->ativo == 1)
                            <button type="button" class="btn btn-outline-danger btn-sm">Desativar culto</button>
                        @else
                            <button type="button" class="btn btn-outline-success btn-sm">Ativar culto</button>
                        @endif --}}
                        <button type="button"
                                class="btn btn-outline-{{$culto->ativo == 1 ? 'danger' : 'success'}} btn-sm"
                                onclick="alteraStatus({{$culto->id}})"
                                id="acao-{{$culto->id}}">
                                    {{$culto->ativo == 1 ? 'Desativar' : 'Ativar'}} culto
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function alteraStatus(id){
            const url = "{!! URL::to('/culto/alterastatus/') !!}"+'/'+id;

            $.ajax({
                type: 'GET',
                url: url,
                success: function(data){
                    if(data == 1){
                        $('#acao-'+id).html('Desativar culto');
                        $('#acao-'+id).removeClass('btn-outline-success');
                        $('#acao-'+id).addClass('btn-outline-danger');

                        $('#ativo-'+id).html('houve');
                        $('#ativo-'+id).removeClass('bg-danger');
                        $('#ativo-'+id).addClass('bg-success');

                        $('#data-'+id).css('text-decoration','none');
                    }else{
                        $('#acao-'+id).html('Ativar culto');
                        $('#acao-'+id).removeClass('btn-outline-danger');
                        $('#acao-'+id).addClass('btn-outline-success');

                        $('#ativo-'+id).html('não houve');
                        $('#ativo-'+id).removeClass('bg-success');
                        $('#ativo-'+id).addClass('bg-danger');

                        $('#data-'+id).css('text-decoration','line-through');

                    }
                },
                error: function(){
                    alert('Erro no Ajax !');
                }
            });
        }
    </script>
</x-tela-layout>
