function showSection(sectionId) {
    console.log("Clicked section: " + sectionId); // Debugging statement
    var sections = document.querySelectorAll('.section');
    for (var i = 0; i < sections.length; i++) {
        if (sections[i].id === sectionId) {
            sections[i].style.display = 'block';
        } else {
            sections[i].style.display = 'none';
        }
    }
}
// Automatically show section based on URL anchor
window.onload = function() {
    var hash = window.location.hash.substr(1);
    if (hash) {
        showSection(hash);
    }
};


window.addEventListener('load', function() {
    // Set sidebar height when the page loads
    setSidebarHeight();
    
    // Listen for click events on nav links
    var navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(function(navLink) {
        navLink.addEventListener('click', function() {
            // Update sidebar height when a nav link is clicked
            setSidebarHeight();
        });
    });
});

window.addEventListener('resize', function() {
    // Update sidebar height when the window is resized
    setSidebarHeight();
});

function setSidebarHeight() {
    // Get the height of the currently active section
    var activeSection = document.querySelector('.section.active');
    if (activeSection !== null) {
        var currentSectionHeight = activeSection.offsetHeight;

        // Set the height of the sidebar to match the height of the active section
        var sidebar = document.querySelector('.sidebar');
        if (sidebar !== null) {
            sidebar.style.height = currentSectionHeight + 'px';
        } else {
            console.error('.sidebar element not found');
        }
    } else {
        console.error('.section.active element not found');
    }
}

