document.getElementById('numImages').value = 2;
document.getElementById('numParagraphs').value = 3;



document.addEventListener("DOMContentLoaded", function() {
    // Get the container element for paragraphs and images
    var imageContainer = document.querySelector('.sec2');
    var paragraphContainer = document.querySelector('.sec3');

    var numParagraphs = document.getElementById('numParagraphs').value ;
    var numImages = document.getElementById('numImages').value ;
    
    

    // Get the button elements

    var addImageButton = document.getElementById('addImage');
    var removeImageButton = document.getElementById('removeImage');


    var addParagraphButton = document.getElementById('addParagraph');
    var removeParagraphButton = document.getElementById('removeParagraph');

    // Add event listener for adding a new image
    addImageButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission
        addImage();
    });
    
    // Add event listener for removing an image
    removeImageButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission
        removeImage();
    });

    // Add event listener for adding a new paragraph
    addParagraphButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission
        addParagraph();
    });
    
    // Add event listener for removing the last paragraph
    removeParagraphButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission
        removeLastParagraph();
    });


    // Function to add a new paragraph
    function addImage() {
        var newImage = document.createElement('input');
        numImages++;
        newImage.setAttribute('type', 'file');
        newImage.setAttribute('placeholder', 'image');
        newImage.setAttribute('name', 'image'+numImages);
        newImage.setAttribute('id', 'image'+numImages);
        imageContainer.appendChild(newImage);
        document.getElementById('numImages').value =  numImages ;
    }

    // Function to remove the last image
    function removeImage() {
        var images = imageContainer.querySelectorAll('input');
        if (images.length > 0) {
            imageContainer.removeChild(images[images.length - 1]);
            numImages--;
            document.getElementById('numImages').value =  numImages ;
        }
    }

    // Function to add a new paragraph
    function addParagraph() {
        var newParagraph = document.createElement('textarea');
        numParagraphs++;
        newParagraph.setAttribute('name', 'paragraph'+numParagraphs);
        newParagraph.setAttribute('id', 'paragraph'+numParagraphs);
        newParagraph.setAttribute('placeholder', 'paragraph...');
        newParagraph.setAttribute('cols', '30');
        newParagraph.setAttribute('rows', '2');
        paragraphContainer.appendChild(newParagraph);
        
        document.getElementById('numParagraphs').value = numParagraphs   ;
    }

    // Function to remove the last paragraph
    function removeLastParagraph() {
        var paragraphs = paragraphContainer.querySelectorAll('textarea');
        if (paragraphs.length > 0) {
            paragraphContainer.removeChild(paragraphs[paragraphs.length - 1]);
            numParagraphs--;
        }
        document.getElementById('numParagraphs').value = numParagraphs   ;
    }


    

    
});

