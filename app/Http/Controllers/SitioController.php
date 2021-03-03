<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuraciones;
use App\Models\ProyectosCategorias;
use App\Models\ProyectosImagenes;
use App\Models\Categorias;
use App\Models\Proyectos;
use Mail;

class SitioController extends Controller
{
    
    public function index()
    {
        $proyectos = Proyectos::select('proyectos.*')
                            ->join('proyectos_categorias', 'proyectos_categorias.id_proyecto', '=', 'proyectos.id')
                            ->groupBy('proyectos.id', 'proyectos_categorias.id_categoria')
                            ->inRandomOrder()
                            ->limit(12)
                            ->get();

        $valores = Configuraciones::pluck('valor','id')->toArray();
        return view('sitio.index')
            ->with('proyectos', $proyectos)
            ->with('valores', $valores);
    }    

    public function proyectos()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "PROYECTOS";
        $valores['img'][0] = "c.jpeg";
        $categorias = Categorias::get();
        $proyectos = Proyectos::select('proyectos.*')
                                ->join('proyectos_categorias', 'proyectos_categorias.id_proyecto', '=', 'proyectos.id')
                                ->groupBy('proyectos.id', 'proyectos_categorias.id_categoria')
                                ->orderBy('proyectos_categorias.id_categoria', 'ASC')
                                ->get()
                                ->toArray();
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
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $proyecto = Proyectos::select('proyectos.*', 'tipos_proyectos.nombre as tipoProyecto')
                               ->where('proyectos.id', $idProyecto)
                               ->join('tipos_proyectos', 'tipos_proyectos.id', '=', 'proyectos.tipo')
                               ->first();
        $imagenes = ProyectosImagenes::where('id_proyecto', $idProyecto)->get();

        $valores['titulo'] = "PROYECTOS";
        $valores['img'][0] = "c.jpeg";

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
        $valores['img'][0] = "3construccione.jpg";
        return view('sitio.construcciones')
            ->with('valores', $valores);
    }    

    public function nosotros()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "NOSOTROS";
        $valores['img'][0] = "4nosotros.jpg";
        return view('sitio.nosotros')
            ->with('valores', $valores);
    }   

    public function inspiracion()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "INSPIRACIÓN";
        $valores['img'][0] = "1inspiracion.jpg";
        return view('sitio.inspiracion')
            ->with('valores', $valores);
    }    

    public function prensa()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "PRENSA";
        $valores['img'][0] = "5prensa.jpg";
        return view('sitio.prensa')
            ->with('valores', $valores);
    }    

    public function contacto()
    {
        $valores = Configuraciones::pluck('valor','id')->toArray();
        $valores['titulo'] = "CONTACTO";
        $valores['img'][0] = "5prensa.jpg";
        return view('sitio.contacto')
            ->with('valores', $valores);
    }    



}
