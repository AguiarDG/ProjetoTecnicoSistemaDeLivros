<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function generatePDF($page)
    {

        switch ($page) {
            case 'home':
                $livrosReport = $this->getLivrosReport();
                $assuntosReport = $this->getAssuntosReport();
                $autoresReport = $this->getAutoresReport();

                $dataReport = [
                    'title1' => 'Relatório - Livros',
                    'title2' => 'Relatório - Assuntos',
                    'title3' => 'Relatório - Autores',
                    'date' => date('d/m/Y'),
                    'livros' => $livrosReport,
                    'assuntos' => $assuntosReport,
                    'autores' => $autoresReport
                ];
                break;
            case 'livros':
                $livrosReport = $this->getLivrosReport();

                $dataReport = [
                    'title' => 'Relatório - Livros',
                    'date' => date('d/m/Y'),
                    'livros' => $livrosReport
                ];
                break;
            case 'assuntos':
                $assuntosReport = $this->getAssuntosReport();

                $dataReport = [
                    'title' => 'Relatório - Assuntos',
                    'date' => date('d/m/Y'),
                    'assuntos' => $assuntosReport
                ];
                break;
            case 'autores':
                $autoresReport = $this->getAutoresReport();

                $dataReport = [
                    'title' => 'Relatório - Autores',
                    'date' => date('d/m/Y'),
                    'autores' => $autoresReport
                ];
                break;

            default:
                $livrosReport = $this->getLivrosReport();

                $dataReport = [
                    'title' => 'Relatório - Geral',
                    'date' => date('d/m/Y'),
                    'livros' => $livrosReport
                ];
                break;
        }

        $viewReport = $page == 'home' ? 'report' : $page . '.report';
        $fileReport = $page == 'home' ? 'geral' : $page;

        $pdf = PDF::loadView($viewReport, $dataReport);

        return $pdf->download($fileReport . '_relatorio.pdf');
    }

    protected function getLivrosReport() {

        $livrosReport = DB::select('SELECT * FROM livros_info');

        return $livrosReport;
    }

    protected function getAssuntosReport() {
        $assuntosReport = Assunto::all(['id_assunto', 'descricao']);

        return $assuntosReport;
    }

    protected function getAutoresReport() {
        $autoresReport = Autor::all(['id_autor', 'nome']);

        return $autoresReport;
    }

}
