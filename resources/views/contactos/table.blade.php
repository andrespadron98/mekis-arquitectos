<div class="table-responsive">
    <table class="table" id="contactos-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Celular</th>
        <th>Correo</th>
        {{-- <th>Cuentanos</th> --}}
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contactos as $contactos)
            <tr>
                       <td>{{ $contactos->nombre }}</td>
            <td>{{ $contactos->celular }}</td>
            <td>{{ $contactos->correo }}</td>
            {{-- <td>{{ $contactos->cuentanos }}</td> --}}
                       <td class=" text-center">
                           {!! Form::open(['route' => ['contactos.destroy', $contactos->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('contactos.show', [$contactos->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               {{-- <a href="{!! route('contactos.edit', [$contactos->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a> --}}
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
