<x-tela-layout>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('culto.index')}}">Cultos</a></li>
            <li class="breadcrumb-item active">Lista de comparecimento</li>
        </ol>
        <h2 class="fw-bold">{{\Carbon\Carbon::parse($data)->format('d/m/Y')}} - {{ucfirst($dia)}}</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Nome</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listaComparecimento as $lista)
                <tr>
                    {{-- <th scope="row">{{$lista->id}}</th> --}}
                    <td>{{$lista->nome}}</td>
                    <td>
                        <span class="badge rounded-pill bg-{{$lista->compareceu == 1?'success':'danger'}}" id="compareceu-{{$lista->id}}">
                            {{$lista->compareceu == 1?'compareceu':'não compareceu'}}
                        </span>
                    </td>
                    <td>
                        {{-- <button type="button" class="btn btn-outline-primary btn-sm">Editar</button> --}}
                        <button type="button"
                                class="btn btn-outline-{{$lista->compareceu == 1 ? 'danger' : 'success'}} btn-sm"
                                onclick="alteraStatus({{$lista->id}})"
                                id="presenca-{{$lista->id}}">
                                    {{$lista->compareceu == 1 ? 'Desativar' : 'Ativar'}} presença no culto
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        function alteraStatus(id){
            const url = "{!! URL::to('/culto/listacomparecimento/alterastatus/') !!}"+'/'+id;

            $.ajax({
                type: 'GET',
                url: url,
                success: function(data){
                    if(data == 1){
                        $('#compareceu-'+id).html('compareceu');
                        $('#compareceu-'+id).removeClass('bg-danger');
                        $('#compareceu-'+id).addClass('bg-success');

                        $('#presenca-'+id).html('Desativar presença no culto');
                        $('#presenca-'+id).removeClass('btn-outline-success');
                        $('#presenca-'+id).addClass('btn-outline-danger');
                    }else{
                        $('#compareceu-'+id).html('não compareceu');
                        $('#compareceu-'+id).removeClass('bg-success');
                        $('#compareceu-'+id).addClass('bg-danger');

                        $('#presenca-'+id).html('Ativar presença no culto');
                        $('#presenca-'+id).removeClass('btn-outline-danger');
                        $('#presenca-'+id).addClass('btn-outline-success');

                    }
                },
                error: function(){
                    alert('Erro no Ajax !');
                }
            });
        }
    </script>

</x-tela-layout>
