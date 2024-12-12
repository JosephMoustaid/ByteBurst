<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawesome icons -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- my css (scss)-->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">    
    <title>Publish new</title>
</head>
<body class="publish-form-page__body " id="publish-form-page__body2" >
    
    
    <div class="container publish publish2">
        <form action="../backend/postVerrification.php" method="post" enctype="multipart/form-data"  class="row" >   
            <div class="sec sec1 col-xxs-12 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <input type="text" placeholder="publisher" name="publisher" id="publisher" class="publisher" !important>
                <input type="text" placeholder="title" name="title" id="title" class="title" !important>
                <select name="categorie" id="categorie" name="categorie" !important>
                        <option value="politics">politics</option>
                        <option value="tech">tech</option>
                        <option value="science">sport</option>
                        <option value="justice">justice</option>
                        <option value="world">world</option>
                        <option value="nature">nature</option>
                        <option value="environnement">environnement</option>
                        <option value="AI">AI</option>
                        <option value="science">science</option>
                        <option value="science">education</option>
                        <option value="health">health</option>
                    
                </select>
            </div>
            <div class="sec sec2 col-xxs-12 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <input type="hidden" name="numImages" id="numImages" value="2">

                <input type="file" placeholder="image" name="image1" id="image1" class="" !important>
                <input type="file" placeholder="image" name="image2" id="image2" class="" !important>

                
            </div>
            <div class="sec sec3 col-xxs-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <input type="hidden" name="numParagraphs" id="numParagraphs" value="3">

                <textarea name="paragraph1" placeholder="paragraph..." id="paragraph1" cols="30" rows="2" !important></textarea>
                <textarea name="paragraph2" placeholder="paragraph..." id="paragraph2" cols="30" rows="2"></textarea>
                <textarea name="paragraph3" placeholder="paragraph..." id="paragraph3" cols="30" rows="2"></textarea>

                
                

            </div>

            <div class="sec sec4 col-xxs-12 col-xs-12 col-sm-12 col-md-3 col-lg-3">
            </div>

            <div class="sec sec4 col-xxs-12 col-xs-12 col-sm-12 col-md-3 col-lg-3 images">
                <button id="removeImage"><i class="bi bi-trash-fill"></i> remove </button>
                <button id="addImage"><i class="bi bi-plus-circle-fill"></i> Add image</button>
            </div>

            <div class="sec sec4 col-xxs-12 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <button id="removeParagraph"><i class="bi bi-trash-fill"></i> Remove pragraph</button>
            </div>

            <div class="sec sec4 col-xxs-12 col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <button  id="addParagraph"><i class="bi bi-plus-circle-fill"></i> Add paraghraph</button>
            </div>
            <div class="sec sec4 col-xxs-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button id="finish">Finish</button>
            </div>
        </form>
        
        
    </div>




    
    <?php include_once("../pages/footer.php") ?>
    <script src="../javascript/goBack.js"></script>
    <script src="../javascript/tmp.js"></script>

</body>
</html>
