<?php
namespace App\CLIScripts;

use App\Controller\TourFileController;
use App\Controller\QueueController;
use App\Entity\TourFile;
use Exception;


$tourFileController = new TourFileController();
$queueController = new QueueController();

/* @var TourFile[]|null $tourFiles*/
$tourFiles = $tourFileController->getNotProcessedTourFiles();
try {
    $queueController->addToQueue($tourFiles);
} catch (Exception $e) {
    return $e->getMessage();
}
