<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Letter as Letter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Address as Address;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Spatie\MediaLibrary\MediaStream as MediaStream;
class ReportController extends Controller
{

    public function exportAll()
    {
        $letters = Letter::all();
        $files = [];
        $i = 0;
        foreach ($letters as $letter){
            $pdf = PDF::loadView('reports.letter', compact('letter'));
            $files[$i++] =  $pdf->save($letter->person()->first()->lastname.'.pdf');
        }
        return  ;


    }

    public function letterPdf(Letter $letter)
    {
        view()->share('reports.letter', compact('letter'));
        $pdf = PDF::loadView('reports.letter', compact('letter'));
        return $pdf->stream('lettre.pdf');
    }

    public function answerPdf(Answer $answer)
    {
        view()->share('reports.answer', compact('answer'));
        $pdf = PDF::loadView('reports.answer', compact('answer'));
        return $pdf->stream('reponse.pdf');
    }

    public function exportAddresses(){
        $addresses = Address::all();
        view()->share('reports.addresses', compact('addresses'));
        $pdf = PDF::loadView('reports.addresses', compact('addresses'));
        return $pdf->stream('adresses.pdf');
    }
}
