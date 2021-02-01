<div class="table-responsive">
    <table class="table" id="configuraciones-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Valor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($configuraciones as $configuraciones)
            <tr>
                       <td>{{ $configuraciones->nombre }}</td>
            <td>{{ $configuraciones->valor }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['configuraciones.destroy', $configuraciones->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               {{-- <a href="{!! route('configuraciones.show', [$configuraciones->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a> --}}
                               <a href="{!! route('configuraciones.edit', [$configuraciones->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!} --}}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
