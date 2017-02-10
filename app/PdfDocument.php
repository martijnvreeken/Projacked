<?php
namespace Projacked;

use Dompdf\Dompdf;
use Illuminate\Filesystem\Filesystem;

/**
 * Description of PdfDocument
 *
 * @author martijn
 */
class PdfDocument {
    protected $dom;

    public function __construct(Dompdf $dom, Filesystem $fs) {
        $this->dom = $dom;
        $this->fs = $fs;
        $this->dom->set_paper('A4', 'portrait');
//        $this->dom->set_option('fontDir', public_path() . '/fonts');
    }
    
    public function setContent($html) {
        $this->dom->loadHtml($html);
        $this->setPageNumbers();
        $this->dom->render();
    }
    
    protected function setPageNumbers() {
        $x = 535;
        $y = 790;
        $text = "{PAGE_NUM} / {PAGE_COUNT}";
        $size = 8;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $this->dom->get_canvas()->page_text($x, $y, $text, NULL, $size, $color, $word_space, $char_space, $angle);
    }
    
    public function response($fileName) {
        $this->dom->stream($fileName, array('Attachment'=>1)); // 0 open / 1 download
    }
    
    public function save($fileName) {
        return \Storage::disk('public')->put($fileName, $this->dom->output());
    }
    
    public function getHash() {
        return md5($this->dom->output());
    }
}
