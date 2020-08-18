<?php

namespace App\Controller;

use App\Entity\Capitalize;
use App\Entity\Master;
use App\Entity\Spaces;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MasterController extends AbstractController      // for using the logger in monolog change the permissions with sudo chown www-data:www-data log -R so that apache can then write the logs for you.
{
    /**
     * @Route("/master", name="master")
     */
    public function index(Request $request)
    {
        $message= '';
        if ($request->request->get('message')) {
            $message = $request->request->get('message');
            $logger = new Logger('Master');
            $logger->pushHandler(new StreamHandler(__DIR__ . '/../../log/log.info', Logger::INFO));    // __DIR__ is the exact current position of the file and you go out two folders to the project root and then to the log folder.
            if ($request->request->get('method') == 'Capitalize') {
                $transform = new Capitalize();
            }else {
                $transform = new Spaces();
            }

            $master = new Master( $message, $logger, $transform );   // DI is again injecting these objects into the newly created object
            $transformedMessage = $master->getMessage();
            return $this->render('master/index.html.twig', [
               'message'  => $transformedMessage
            ]);

        }



        return $this->render('master/index.html.twig', [
            'message' => $message
        ]);


    }
}
