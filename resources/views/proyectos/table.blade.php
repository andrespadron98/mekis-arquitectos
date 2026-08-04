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
                    <form action="{{ route('proyectosPortal.destroy', [$proyectos->id]) }}" method="POST">
@csrf
@method('DELETE')
                    <div class='btn-group'>
                        <a href="{!! route('proyectos', [$proyectos->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                        <a href="{!! route('proyectosPortal.edit', [$proyectos->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger action-btn delete-btn" onclick="return confirm("Are you sure want to delete this record ?")"><i class="fa fa-trash"></i></button>
                    </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
