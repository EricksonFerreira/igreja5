<x-tela-layout>
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Compareceu</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presencaCultos as $presencaCulto)
                <tr>
                    {{-- <th scope="row">{{$presencaCulto->id}}</th> --}}
                    <td>{{$presencaCulto->nome}}</td>
                    <td>{{\Carbon\Carbon::parse($presencaCulto->data)->format('d/m/Y')}}</td>
                    <td>{{$presencaCulto->dia}}</td>
                    <td>
                        <span class="badge rounded-pill bg-{{$presencaCulto->ativo == 1?'success':'danger'}}">
                            {{$presencaCulto->ativo == 1?'houve':'não houve'}}
                        </span>
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-{{$presencaCulto->compareceu == 1?'success':'danger'}}">
                            {{$presencaCulto->compareceu == 1?'compareceu':'não compareceu'}}
                        </span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm">Editar</button>
                        @if ($presencaCulto->compareceu == 1)
                            <button type="button" class="btn btn-outline-danger btn-sm">Desativar presença no culto</button>
                        @else
                            <button type="button" class="btn btn-outline-success btn-sm">Ativar presença no culto</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-tela-layout>
