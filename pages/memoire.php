


<!DOCTYPE HTML>

<HTML >
    <HEAD>
        
        
        <!-- source = http://rootslabs.net/blog/538-embarquer-pdf-page-web-pdf-js -->
        
        <script src="./lib/pdfjs/build/pdf.js"></script>
        <script>
        PDFJS.workerSrc='./lib/pdfjs/build/pdf.worker.js';    
        </script>
        

        
    </HEAD>
    <body>
        <canvas id="canvasPDF" style="border:1px solid black;"></canvas>
        <button id="b">next page</button>
        
                <script>
                    var numPage=1;
            var totalPage=null;
            var oPDF=PDFJS.getDocument('./pages/PFE.pdf');
            
                    
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
    </body>
</HTML>