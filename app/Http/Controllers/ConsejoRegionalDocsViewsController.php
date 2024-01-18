<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\DocumentoGeneral;
use App\Models\Documentonew;
use App\Models\Acta;
use App\Models\Acuerdo;
use App\Models\ResumenGastos;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class ConsejoRegionalDocsViewsController extends Controller
{
    public function Indexactas()
    {
        // Obtener todas las actas y su relación con Documentonew
        $actas = Acta::with('documentonew')->get();

        // Pasar las actas a la vista
        return view('consejoregionaldocsviews.actas.index', ['actas' => $actas]);
    }


    public function Indexcertificadosdeacuerdos()
    {
        // Obtener todos los acuerdos y su relación con Documentonew
        $acuerdos = Acuerdo::with('documentonew')->get();

        // Pasar los acuerdos a la vista
        return view('consejoregionaldocsviews.certificadosdeacuerdos.index', ['acuerdos' => $acuerdos]);
    }

    public function Indexresumendegastos()
    {
        // Obtener los resúmenes de gastos con paginación
        $resumenesGastos = ResumenGastos::with('documentonew')->paginate(8); // 8 ítems por página

        // Pasar los resúmenes de gastos a la vista
        return view('consejoregionaldocsviews.resumendegastos.index', ['resumenesGastos' => $resumenesGastos]);
    }

    public function Indextablassesionesconsejo(){

        return view('consejoregionaldocsviews.tablassesionesconsejo.index');
    }   
}
