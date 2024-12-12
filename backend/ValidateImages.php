<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Confirmation</title>
</head>
<body class="bg-dark w-50 " style="margin: 100px auto; color:azure;">
    
    <?php 
        // HERE WE MAKE ALL THE CHECKS INTO VARIABLES
        // description checking

        $fileExists = isset($_FILES['image1']);
        $fileEmpty = empty($_FILES['image1']);
        $fileName = $_FILES['image1']['name'];
        $fileSize = $_FILES['image1']['size'];
        $fileErrors = $_FILES['image1']['error'];
        $validExtension=false;
        $fileInfo= pathinfo($fileName);     // phpinfo : returns an array of information about the file name specified 
        $extension= $fileInfo['extension']; // we get the extenssion using the associatif array  : $fileInfo , and the key: extension
        $validExtensions=['png','jpeg','gif','jpg','heic','webp','avif'];    // here we make a table of valid file extensions to controll the user input file
        $validExtension=in_array($extension,$validExtensions);

        // $_FILES['image1']['size']
        // la taille en octet :  1 000 octet = 1 ko   , 1 000 000 octet = 1 Mo
        // php limite la taille en 8 mo , par default , donc il n'accepte pas plus de 8 Mo
        $readableFileSize;
        switch(true) :
            case ($fileSize < 1000):
                $readableFileSize = $fileSize." octet" ;
                break;
            case ($fileSize >= 1000 and $fileSize < 1000000):
                $readableFileSize = ($fileSize / 1000)." Ko" ;
                break;
            case ($fileSize >= 1000000 ):
                $readableFileSize = ($fileSize / 1000000)." Mo" ;
                break;
        endswitch;
    ?>

    

<?php 
     // HERE WE USE THE CHECK VARIABLES IN AN IF STATEMENT TO EITHOR CONTINUE , OR GET THE USER TO GO BACK AND CORRECT THE PROBLEM
    if (  !$fileExists || $fileEmpty ||  $fileSize>8000000 || $fileErrors >  0 || !$validExtension)  : ?>
    
        <a href="javascript:history.back();">Go Back to correct the issue</a>
        <?php 
 
            // image1 checking
            echo ( !$fileExists )? "* you have to include the image *  \n" : "" ;
            echo ( !$validExtension  ) ?"* unvalid extension *  \n" : "" ;
            echo( $fileSize > 8000000  ) ? "* image must be under 8 mo *  \n" : "" ;
            echo( $fileErrors > 0  ) ? "* file has errors *  \n" : "" ;
        ?>

    <?php else :?>

        <?php 
            //since everything went right , now we can save the uploaded file to our machine Uploads folder that we created , using :
            // move_uploaded_file( le-nom-temporaire-de-fichier , le-nouveau-nom-definitif );
            // example : move_uploaded_file( $_FILES['image1']['tmp_name'] , './Uploads/'.basename( $_FILE['image1']['name'] ) );
            $fileMoved=move_uploaded_file($_FILES['image1']['tmp_name'] , '../ImageBase/'.basename($_FILES['image1']['name']) );       
        ?> 
        <?php if($fileMoved):?>

            <div>
                    <strong>image uploaded successfully👌👍</strong>
                    <hr>
                    
                    <h5>File meta data  :</h5>
                    <ul>
                        <li>name : <p> <?php echo $fileName; ?> </p></li>
                        <li>size : <p> <?php echo $readableFileSize; ?> </p></li>
                        <li>error : <p> <?php echo $fileErrors; ?> </p></li>
                        <li>extension : <p> <?php echo $extension; ?> </p></li>
                    </ul>
                    <hr>         
            </div>
        <?php else :?>
            <div>
                <strong>No Errors but image wasn't moved</strong>  
            </div>
        <?php endif;?>

    <?php  endif; ?>
    <a href="javascript:void(0)" class="goBack" onclick="goBack();">
        Go back <i class="bi bi-arrow-left"></i>
    </a>
    <script src="../javascript/goBack.js"></script>

</body>
</html>
