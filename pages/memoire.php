<?php
require_once('../includes/config/config.php');
require_once('../'.$config['paths']['includes'] . '/header.php');

?>

        
        
        <!-- source = http://rootslabs.net/blog/538-embarquer-pdf-page-web-pdf-js -->
        
        <script src="./lib/pdfjs/build/pdf.js"></script>
        <script>
        PDFJS.workerSrc='./lib/pdfjs/build/pdf.worker.js';    
        </script>

<div style="float:left">
    
  
    <div style="width:auto;display: inline-block;border:0px solid #000;">
        <canvas id="canvasPDF" class="" style="border:1px solid #ccc;  margin:0px;"></canvas>
        
        <div class="text-center" >
            <span id="bp" class="btn "><span><?php echo $lang[36]; ?></span></span>
            <span id="bn" class="btn "><span><?php echo $lang[35]; ?></span></span>
        </div>
    </div>
    
    <aside class="pull-left" style="margin-left:0px;">
            <ul class="nav">
                <li class="nav-item">
                    <span onclick="chapitre(1)">PAGE DE GARDE</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(2)">DÉDICACES</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(3)">REMERCIEMENTS</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(4)">RÉSUMÉS</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(10)">LISTES</span>
                </li> 
                <li class="nav-item">
                    <span onclick="chapitre(15)">INTRODUCTION GENERALE</span>
                </li>
                
                <li class="nav-item">
                    <span onclick="chapitre(17)">1 INTRODUCTION À LA RCONNAISSANCE DU MANUSCRIT</span>
                    <ul>
                        <li><span onclick="chapitre(17)">1.1 Introduction</span></li>
                        <li><span onclick="chapitre(17)">1.2 Reconnaissance de l’écriture manuscrite</span></li>
                        <li><span onclick="chapitre(17)">1.3 Le manuscrit arabe</span></li>
                        <li><span onclick="chapitre(20)">1.4 Définitions</span></li>
                        <li><span onclick="chapitre(22)">1.5 Traitement d'image</span></li>
                        <li><span onclick="chapitre(22)">1.6 Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(23)">2 L'EXTRACTION DE CARACTÉRISTIQUES</span>
                    <ul>
                        <li><span onclick="chapitre(23)">2.1 Introduction</span></li>
                        <li><span onclick="chapitre(23)">2.2 Extraction de l'information par la méthode LM</span></li>
                        <li><span onclick="chapitre(24)">2.3 Extraction des caractéristiques par la méthode FT</span></li>
                        <li><span onclick="chapitre(30)">2.4 Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(31)">3 LA COMBINAISON DE CLASSIFIEURS</span>
                    <ul>
                        <li><span onclick="chapitre(31)">3.1 Introduction</span></li>
                        <li><span onclick="chapitre(31)">3.2 Classification</span></li>
                        <li><span onclick="chapitre(34)">3.3 Les méthodes de combinaison</span></li>
                        <li><span onclick="chapitre(43)">3.4 Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(44)">4 LES CLASSIFIEURS UTILISÉS</span>
                    <ul>
                        <li><span onclick="chapitre(44)">4.1 Introduction</span></li>
                        <li><span onclick="chapitre(44)">4.2 Les réseaux de neurones</span></li>
                        <li><span onclick="chapitre(45)">4.3 Architectures</span></li>
                        <li><span onclick="chapitre(49)">4.4 Les Algorithmes d'apprentissage</span></li>
                        <li><span onclick="chapitre(50)">4.5 Les machines à vecteurs de support SVM</span></li>
                        <li><span onclick="chapitre(53)">4.6 LIBSVM</span></li>
                        <li><span onclick="chapitre(56)">4.7 Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(57)">5 IMPLÉMENTATION, TESTS ET RÉSULTATS</span>
                    <ul>
                        <li><span onclick="chapitre(57)">5.1 Introduction</span></li>
                        <li><span onclick="chapitre(57)">5.2 Environement de travail</span></li>
                        <li><span onclick="chapitre(59)">5.3 Implémentation</span></li>
                        <li><span onclick="chapitre(72)">5.4 Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(73)">CONCLUSION GÉNÉRALE</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(75)">RÉFÉRENCES</span>
                </li>
                
            </ul>
        </aside>
    </div>
<div style="clear:both"></div>



                <script>
                    var numPage=1;
            var totalPage=null;
            var oPDF=PDFJS.getDocument(config["pdf"] + 'memoire.pdf');
            
            function chapitre(Npage){
                numPage=Npage;
                oPDF.then(renderPDF);
            } 
            function renderPDF(pdf){
                if(totalPage==null){
                    totalPage=pdf.numPages;
                }
                bp.style.display="inline";
                b.style.display="inline";
                if(numPage == 1){
                    bp.style.display="none";
                }else if(numPage == totalPage){
                    b.style.display="none";
                }
                if(numPage <= totalPage){
                    b.style.display='bolck'
                    pdf.getPage(numPage).then(renderPage);
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                    
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
                    
                    ////////////// firt page //////////////
                     oPDF.then(renderPDF);
                    
            b=document.getElementById('bn');
            bp=document.getElementById('bp');
                    
                    /********* next page *******/
            b.addEventListener('click',function(){
                if(numPage < totalPage){
                numPage++;
                oPDF.then(renderPDF);
                }
            });
                    /********** last page *********/
            bp.addEventListener('click',function(){
                if(numPage > 1){
                numPage--;
                oPDF.then(renderPDF);
                }
            });
        </script>
 <?php
require_once('../'.$config['paths']['includes'] . '/footer.php');
?>
