<div class="table-responsive">
    <table class="table" id="proyectos-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Comuna</th>
                <th>Ciudad</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proyectos as $proyectos)
            <tr>
                <td>{{ $proyectos->nombre }}</td>
                <td>{{ $proyectos->comuna }}</td>
                <td>{{ $proyectos->ciudad }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['proyectosPortal.destroy', $proyectos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('proyectos', [$proyectos->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('proyectosPortal.edit', [$proyectos->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
