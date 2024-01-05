<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
    h1 , h2{
        color: #565656;
    }
    .principal{
        border: 1px solid #CCCCCC;
        border-radius: 10px;       
    }
    .first-form{
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }
    input.form-control{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    font-style: italic;
    }
    .style-label{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    }
    .style-col-menu{
        background-color: #0c1e35;
    }
    button.btn.btn-link {
    color: #FFFFFF;
    text-decoration: none;
    font-family: unset;
    font-weight: 700;
    }
    li.style-li{
        list-style: none;
        padding-bottom: 10px;
    }
    a.style-a-menu{
    color: #FFFFFF;
    text-decoration: none;
    font-weight: 500;   
    }
</style>
<div class="container-fluid body">
    <div class="row">
        <div class="col-md-2 style-col-menu">
            <div class="container menu">
            @include('layouts.menu')
            </div>
        </div>
        <div class="col-md-10">
            <div class="container principal mt-4 mb-4 pt-3 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Concejeros de Osorno</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <h1>Listado de Concejeros de Osorno</h1>
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('consejerososorno.create') }}" class="btn btn-success mt-3 mb-3" style="width: 250px;">Agregar Consejero</a>
                                </div>
                            </div>
                        </div>

                        @if(count($consejeros) > 0)
                        <div class="container">
                            <ul>
                                @foreach($consejeros as $consejero)
                                <li class="milist mt-4 mb-4">
                                    {{ $consejero->nombres }} {{ $consejero->apellidos }}
                                    <a href="{{ route('consejerososorno.edit', $consejero->id) }}" class="btn btn-primary">Ver consejero</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                        <p>No hay consejeros disponibles.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>