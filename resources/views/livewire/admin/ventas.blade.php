<div>
    @php
        use Carbon\Carbon;
    @endphp

    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">

        <div class="card-header">
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="text" class="form-control" placeholder="Búsqueda por fecha o nombre de servicio o referencia de pago">
            </div>
        </div>

        @if($ordenes->count())

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre del servicio</th>
                                <th>Precio de venta</th>
                                <th>Referencia de pago - Mercado Pago</th>
                                <th>Comprador</th>
                                <th>Mail del comprador</th>
                                <th>Compañía del comprador</th>
                                <th>Teléfono del comprador</th>
                                <th>Fecha de venta</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $counter=1;?>
                            @foreach ($ordenes as $orden)
                                <tr>
                                    <td><?php echo $counter;?></td>
                                    
                                    
                                    <td class="align-middle">
                                        <img src="{{ asset('images/service.svg') }}" alt="service" class="mr-1" height="25" width="25">
                                        {{ $orden->titulo }}
                                    </td>

                                    <td class="align-middle">
                                        <img src="{{ asset('images/money.svg') }}" alt="money" class="mr-1" height="20" width="20">
                                        {{ number_format($orden->precio, 0, ',', '.') }}
                                    </td>

                                    <td class="align-middle">
                                        <img src="{{ asset('images/mercado-pago.svg') }}" alt="mercado pago" class="mr-1" height="20" width="20">
                                        {{ $orden->referencia_pago }}
                                    </td>

                                    
                                    <td class="align-middle">
                                        <img src="{{ asset('images/user.svg') }}" alt="compania" class="mr-1" height="20" width="20">
                                        {{ $orden->user->name }}
                                    </td>

                                    <td class="align-middle">
                                        <img src="{{ asset('images/mail.svg') }}" alt="mail" class="mr-1" height="20" width="20">
                                        {{ $orden->user->email }}
                                    </td>
                                    
                                    <td class="align-middle">
                                        <img src="{{ asset('images/compania.svg') }}" alt="compania" class="mr-1" height="20" width="20">
                                        {{ $orden->user->userDetails->compania }}
                                    </td>

                                    <td class="align-middle">
                                        <img src="{{ asset('images/phone.svg') }}" alt="phone" class="mr-1" height="20" width="20">
                                        {{ $orden->user->userDetails->telefono }}
                                    </td>
                                    
                                    <td class="align-middle">
                                        <img src="{{ asset('images/date.svg') }}" alt="date" class="mr-1" height="20" width="20">
                                        {{ \Carbon\Carbon::parse($orden->created_at)->format('d/m/Y') }}
                                    </td>
                                </tr>
                            <?php $counter++;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer">
                {{ $ordenes->links() }}
            </div>
        @else
            
            <div class="card-body">
                <strong>No hay resultados para su búsqueda</strong>
            </div>

        @endif

    </div>

</div>
