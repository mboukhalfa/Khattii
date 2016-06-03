<?php
require_once('../includes/config/config.php');
require_once('../'.$config['paths']['includes'] . '/header.php');

?>

        
        
        <!-- source = http://rootslabs.net/blog/538-embarquer-pdf-page-web-pdf-js -->
        
        <script src="./lib/pdfjs/build/pdf.js"></script>
        <script>
        PDFJS.workerSrc='./lib/pdfjs/build/pdf.worker.js';    
        </script>

        <canvas id="canvasPDF" style="border:1px solid black;"></canvas>
        <span id="b" class="bigbutton bg1" ><span><?php echo $lang[35]; ?></span></span>
        
                <script>
                    var numPage=1;
            var totalPage=null;
            var oPDF=PDFJS.getDocument(config["pdf"] + 'memoire.pdf');
            
                    
            function renderPDF(pdf){
                if(totalPage==null){
                    totalPage=pdf.numPages;
                }
                if(numPage<=totalPage){
                    pdf.getPage(numPage).then(renderPage);
                    numPage++;
                    
                }
            }
            function renderPage(page){    
                var scale = 1.5;     
                var viewport = page.getViewport(scale);  
                var canvas = document.getElementById('canvasPDF');   
                var context = canvas.getContext('2d');    
                canvas.height = viewport.height;    
                canvas.width = viewport.width;      
                var renderContext = {      
                    canvasContext: context,       
                    viewport: viewport     };        
                page.render(renderContext); }
            b=document.getElementById('b');
            b.addEventListener('click',function(){
                oPDF.then(renderPDF);
            });
        </script>
 <?php
require_once('../'.$config['paths']['includes'] . '/footer.php');
?>
