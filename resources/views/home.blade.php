@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Upload</div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form action="{{ route('file.upload')}}" method="post" files="true" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file" class="col-sm-2 col-form-label">Arquivo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="file" name="file">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    @if($qtdCustomers)
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Qtd de vendedores</th>
                                        <th>Qtd. vendedores</th>
                                        <th>Média salarial</th>
                                        <th>Melhor venda</th>
                                        <th>Pior Vendedor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>
                                            {{ $qtdCustomers }}
                                        </td>
                                        <td>
                                            {{ $qtdSalesman }}
                                        </td>
                                        
                                        <td>
                                            {{ $averageSalary}}
                                        </td>
                                        <td>
                                            {{ $bestSale }}
                                        </td>
                                        <td>
                                            {{ $worstSalesman }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#file').change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'dat':
            $('#uploadButton').attr('disabled', false);
            break;
            default:
            alert('Não é permitido esse tipo de arquivo!');
            this.value = '';
        }
    });
</script>
@endsection
