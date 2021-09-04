<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Property;
use App\Repository\PropertyRepository;
// Include Dompdf required namespaces
use Dompdf\Dompdf;
use Dompdf\Options;

class HomeController extends AbstractController
{
    public function index()
    {
        $properties = $this->getDoctrine()->getRepository(Property::class)->findLatest();

        return $this->render('pages/home.html.twig', ['properties' => $properties]);
    }


    public function mypdf(){

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

         dump("hello how are you");
         die();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('mypdf.html.twig', [
            'title' => "Welcome to our PDF Test"
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }
}