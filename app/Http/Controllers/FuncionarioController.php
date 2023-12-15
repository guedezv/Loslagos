<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{

    private $divisiones;
    private $departamentos;

    public function __construct()
    {
        $this->divisiones = [
            'Administración y Finanzas',
            'Presupuesto e Inversión Regional',
            'Planificación y Desarrollo Regional',
            'División Planificación y Desarrollo Regional',
            'Consejo Regional',
            'Intendencia',
            'Gabinete Intendente Regional',
            'División de Fomento e Industria',
            'División de Desarrollo Social y Humano',
            'División de Infraestructura y Transporte',
            'Administrador Regional',
            'Gobernador Regional'
            // ... otras divisiones ...
            ];

            $this->departamentos = [
        'Administración y Finanzas' => [
            "Departamento Finanzas y Presupuesto",
            "Departamento de Gestión y Desarrollo de Personas",
            "Servicios Generales y Correspondencia",
            "Unidad de Informática",
            "Unidad de Adquisiciones",
            "Oficina de Partes y Servicios Generales",
            "Oficina de Partes",
            "Intendencia",
            "Unidad de Prensa",
            "Unidad de Archivos",
            "Unidad de Tecnologías de Información",
            "Unidad de Control de Gestión y Desarrollo"
            // ... otros departamentos ...
        ],
        'Presupuesto e Inversión Regional' => [
            "Departamento de Inversiones",
            "Unidad Jurídica",
            "Departamento de Inversión Complementaria",
            "Unidad de Programación y Control Presupuestario",
            "División Presupuesto e Inversión Regional"
            // ... otros departamentos ...
        ],
        'División Planificación y Desarrollo Regional' => [
            'Departamento Municipios y Forta. Gob.',
            'Unidad Borde Costero',
            'Unidad Provincial de Chiloé',
            'Unidad Provincial de Osorno',
            'Unidad Provincial de Palena',
            'Unidad de Asuntos Internacionales',
            'Unidad de Fomento e Innovación',
            'Unidad Provincial Chiloé',
            'Unidad Provincial Osorno',
            'Unidad Provincial Palena',
            'Plan Patagonia Verde',
            'Unidad Gestion Municipal y Prog. Subdere',
            'División Planificación y Desarrollo Regional',
            'Programa Des. y Fort. de Politica de Prod. Limpia',
            'Departamento de Ordenamiento Territorial',
            'Departamento Estudios y Ordenamiento Territorial',
            'Plan Patagonia Verde-Sectorialistas',
            'Unidad Fortalecimiento y Desarrollo Regional',
            'Depto. Gestion de la Planificacion Estrategica',
            'Depto. Planificacion Estrategica y Politicas Publi',
            'Unidad de Pre Inversion'

        ],
        'Consejo Regional' => [
            
            'Secretaría del Consejo Regional'
        ],

         'Intendencia' => [
        
        ],

        'Gabinete Intendente Regional' => [
       
        ],

        'División de Fomento e Industria' => [
         
            'División de Fomento e Industria'
        ],

         'División de Desarrollo Social y Humano' => [
       
           'División de Desarrollo Social y Humano',
           'Departamento Social' ],

        'División de Infraestructura y Transporte' => [
             'División de Infraestructura y Transporte'
        ],

        'Administrador Regional' => [
         
         'Departamento Jurídico',
         'Unidad de Auditoría',
         'Secretaría Ejecutiva del Consejo Regional' ],

        'Gobernador Regional' => [
          ]

    
];
    }



    public function index() 
    {
     
        $divisiones = $this->divisiones; 
        $departamentos = $this->departamentos;
       

    $funcionarios = Funcionario::all();

    return view('funcionarios.index', compact('funcionarios', 'divisiones', 'departamentos'));
}

    public function create()
    {

        $divisiones = $this->divisiones; 
        $departamentos = $this->departamentos;

        return view('funcionario.create', compact('divisiones', 'departamentos'));
    }

    public function store(Request $request)
    {

      
        $request->validate([
            'nombre' => 'required',
            
            'actividad' => 'nullable',
            'division' => 'nullable',
            'departamento' => 'nullable',
            'cargo' => 'nullable',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'e-mail' => 'nullable',
            'region' => 'nullable',
            'provincia' => 'nullable',
            'comuna' => 'nullable',
           
        ]);

        $datosf = request()->except('_token');
        if($request->hasFile('foto')){
            $datosf['foto'] = $request->file('foto')->store('fotofuncionario','public');

        }

        $datosf['created_at'] = now();
        $datosf['updated_at'] = now();

   
        Funcionario::insert($datosf);
        return redirect('/funcionarios')->with('success', 'Documento guardado exitosamente');
    }

    public function buscar(Request $request)
{
    $divisiones = $this->divisiones; 
    $departamentos = $this->departamentos;

    $request->validate([
        'nombre' => 'nullable',
        
        'division'  => 'nullable',
        'departamento' => 'nullable'
    ]);

    $nombre = $request->input('nombre');

    

    $division = $request->input('division');
    $departamento = $request->input('departamento');

    $funcionarios = Funcionario::query();

    if ($nombre) {
        $funcionarios->where('nombre', 'LIKE', "%$nombre%");
    }

    

    if ($division) {
        $funcionarios->where('division', $division);
    }

    if ($departamento) {
        $funcionarios->where('departamento', $departamento);
    }

    $funcionarios = $funcionarios->get();

    return view('funcionarios.resultados', compact('funcionarios', 'divisiones', 'departamentos'));
}

}