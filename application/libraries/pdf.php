<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {
    
    protected $dompdf;
    
    public function __construct() {
        // Pastikan dompdf sudah diinstall via composer
        require_once FCPATH . 'vendor/autoload.php';
        
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('defaultFont', 'Arial');
        
        $this->dompdf = new Dompdf($options);
    }
    
    public function loadHtml($html) {
        $this->dompdf->loadHtml($html);
    }
    
    public function setPaper($size, $orientation) {
        $this->dompdf->setPaper($size, $orientation);
    }
    
    public function render() {
        $this->dompdf->render();
    }
    
    public function stream($filename, $options = array()) {
        $this->dompdf->stream($filename, $options);
    }
    
    public function output() {
        return $this->dompdf->output();
    }
}