<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuraciones;
use App\Models\ProyectosCategorias;
use App\Models\ProyectosImagenes;
use App\Models\Categorias;
use App\Models\Proyectos;

class SitioController extends Controller
{
    
    public function index()
    {
        $proyectos = Proyectos::get();
        $valores = Configuraciones::pluck('valor','id')->toArray();
        return view('sitio.index')
            ->with('proyectos', $proyectos)
            ->with('valores', $valores);
    }    

    public function proyectos()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "PROYECTOS";
        $valores['img'] = "header-projects.png";
        $categorias = Categorias::get();
        $proyectos = Proyectos::get()->toArray();
        $i = 0;
        foreach($proyectos as $row){
            $proyectos[$i]['categorias'] = ProyectosCategorias::where('id_proyecto', $row['id'])->get()->toArray();
            $i++;
        }
        return view('sitio.proyectos')
            ->with('categorias', $categorias)
            ->with('proyectos', $proyectos)
            ->with('valores', $valores);
    }

    public function verProyecto($idProyecto)
    {
        $proyecto = Proyectos::find($idProyecto);
        $imagenes = ProyectosImagenes::where('id_proyecto', $idProyecto)->get();

        $valores['titulo'] = "PROYECTOS";
        $valores['img'] = "header-projects.png";

        if (empty($proyecto)) {
            return redirect(route('proyectos'));
        }

        return view('sitio.proyecto')
            ->with('imagenes', $imagenes)
            ->with('proyecto', $proyecto)
            ->with('valores', $valores);
    }

    public function construcciones()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "CONSTRUCCIONES";
        $valores['img'] = "header-construcciones.png";
        return view('sitio.construcciones')
            ->with('valores', $valores);
    }    

    public function nosotros()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "NOSOTROS";
        $valores['img'] = "header-we.png";
        return view('sitio.nosotros')
            ->with('valores', $valores);
    }   

    public function inspiracion()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "INSPIRACIÓN";
        $valores['img'] = "header-inspiration.png";
        return view('sitio.inspiracion')
            ->with('valores', $valores);
    }    

    public function prensa()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "PRENSA";
        $valores['img'] = "header-projects.png";
        return view('sitio.prensa')
            ->with('valores', $valores);
    }    

}
