

<nav class="navigationWrapper" id="navigationWrapper">
  <div class="navigation-section" id="navigation-section">
    <div id="HamMenu">
        <div class="logo " id="phoneLogo">
          <a href="." ><img src="../images/logo.png" class="logo" alt="logo" ></a>
        </div>
        <div class="hamburger" id="hamburger">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
          </svg>
        </div>
    </div>

    <ul class="navigation"  id="mainNavigation">
      <li class="navigation--item">
        <a href="."><img src="../images/logo.png" class="logo" alt="logo"></a>
      </li>
      <?php if(!isset($_SESSION['loggedUser']) or empty($_SESSION['loggedUser'])): ?>
      <li class="navigation--item">
        <form action="../forms/sign-in.php">
              <i class="bi bi-person-fill under-lined-icon"></i>
              <a class="link custom-btn" href="../forms/sign-in.php">Sign in</a>
        </form>
      </li>
      <?php else: ?>
      <li class="navigation--item" title="You are signed in">
          <a href="../main pages/profile.php">
            <h2><i class="bi bi-person-check-fill under-lined-icon"></i></h2>
          </a>
      </li>
      <?php endif; ?>
      <li class="navigation--item"><a class="link custom-btn" href="../main pages/index.php">Home</a></li>
      <li class="navigation--item"><a class="link custom-btn" href="../main pages/search-result.php?cetegorie=tech">Tech</a></li>
      <li class="navigation--item"><a class="link custom-btn" href="../main pages/search-result.php?cetegorie=news">News</a></li>
      <li class="navigation--item"><a class="link custom-btn" href="../main pages/search-result.php?cetegorie=tips">Tips</a></li>
      <li class="navigation--item"><a class="link custom-btn" href="../main pages/search-result.php?cetegorie=Feautures">Feautures</a></li>
      <!--
        <li class="navigation--item custom-btn">
        <div class="theme-btn-container">
          <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
          <script>   
              function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'eng'}, 'google_translate_element');
              }
          </script>
          <div id="google_translate_element" style="width: 100px; height:50px; color:white;"></div>
          
          <div class="theme-box">
              <div class="toggle_btn">
                  <div class="inner_circle"></div>
              </div>
              <p class="mode_status">Light Mode</p>
          </div>
          
        </div>
        </li> 
      -->
      <li class="navigation--item search"> 
        <div class="search-container">
            <form method="get" action="../main pages/search-result.php">
                <input type="text" placeholder="Search..." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>  
      </li>
      
    </ul>

    <ul class="navigation" id="categorieNavigation">
      <script>
        let keywords = [
          "tech", "innovation", "AI", "ML", "data","Trump","Biden","Joe Rogan","Javascript", "blockchain", "crypto", "VR", "AR", "IoT", "cyber", "cloud", "big data", "quantum", "5G", "robotics", "automation", "biotech", "nanotech", "smart cities", "sustainability", "renewables", "EVs", "space", "mars", "genetic engineering", "healthtech", "fintech", "insurtech", "edtech", "agritech", "foodtech", "wearables", "smart homes", "gaming", "e-commerce", "social media", "digital marketing", "SEO", "influencer marketing", "video streaming", "podcasting", "remote work", "gig economy", "future of work", "AGI", "self-driving", "drones", "biomed", "telemedicine", "virtual healthcare", "mental health", "financial inclusion", "social impact", "green tech", "carbon capture", "sustainable agri", "organic farming", "reforestation", "climate change", "clean energy", "solar", "wind", "hydrogen", "carbon offset", "green buildings", "sustainable fashion", "circular economy", "zero waste", "ethical consumerism", "slow fashion", "veganism", "plant-based", "sustainable tourism", "ecotourism", "responsible travel", "inclusive education", "online learning", "distance education", "adaptive learning", "inclusive design", "accessible tech", "assistive tech", "universal design", "diversity", "equality", "racial justice", "social justice", "income equality", "UBI", "economic empowerment", "fair trade", "microfinance", "community dev", "urbanization", "affordable housing", "smart cities", "urban planning", "public transport", "cycling infrastructure", "green spaces", "public health", "vaccination", "child health", "maternal health", "healthcare", "primary healthcare", "health education", "telehealth", "wellness tourism", "fitness", "healthy lifestyle", "mindfulness", "meditation", "yoga", "eco-friendly", "reusable", "minimalist", "sustainable transport", "e-bikes", "ride-sharing", "carpooling", "sustainable aviation", "electric planes", "biofuels", "carbon-neutral", "sustainable shipping", "green logistics", "sustainable finance", "impact investing", "green bonds", "ESG", "ethical banking", "microfinance", "community banking", "financial literacy", "digital banking", "crypto", "blockchain", "DeFi", "smart contracts", "NFTs", "digital art", "crypto gaming", "metaverse", "web3.0", "cybersecurity", "privacy", "cybercrime", "identity theft", "online safety", "secure comms", "cyber hygiene", "data breaches", "cloud security", "network security", "threat intel", "ransomware", "incident response", "ethical hacking", "penetration testing", "risk management", "data protection", "GDPR", "HIPAA", "PCI DSS", "SOC 2", "ISO 27001", "cyber insurance", "BCP", "disaster recovery", "incident response", "risk assessment", "risk mitigation", "vendor risk", "digital supply chain", "supply chain", "demand forecasting", "inventory management", "order fulfillment", "last-mile", "reverse logistics", "supply chain", "circular economy", "ethical sourcing", "carbon footprint"
      ];

        var navigationList = document.getElementById('categorieNavigation');
        var selectedIndexes = [];
        for (let i = 0; i < 10; i++) {
            let j;
            do {
                j = Math.floor(Math.random() * keywords.length);
            } while (selectedIndexes.includes(j));
            selectedIndexes.push(j);

            var listItem = document.createElement('li');
            listItem.className = 'navigation--item';
            var anchor = document.createElement('a');
            anchor.className = 'link custom-btn';
            anchor.setAttribute('href', '../main pages/search-result.php?search=' + keywords[j]);
            anchor.textContent = keywords[j];
            listItem.appendChild(anchor);
            navigationList.appendChild(listItem);
        }


      </script>
      <!--
        <li class="navigation--item"><a class="link custom-btn" href="#"></a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">GAZA</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">Tech</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">javasccript</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">node.js</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">performance</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">Twitter</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">pol AI</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">One Piece</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">Ana de armas</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">GTA 6</a></li>
        <li class="navigation--item"><a class="link custom-btn" href="#">news</a></li>
      -->
    </ul>







    <!--Hamburger Menu navigation-->
    <canvas id="canvasNavigation"></canvas>
    <div class="off-canvas">
        <div class="navigation" id="offCanvasNavigation">
          <div>
            <div title="close" class="close-btn">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="close" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
              </svg>
            </div>
          </div>
          <div>
            <div class="search-container">
              <form action="../main pages/search-result.php" method="get" id="menu-form">
                  <input type="text" placeholder="search.." name="search" id="search">
                  <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
          <div>
            <a class="navigation--item link custom-btn" href="../main pages/index.php">Home</a>
          </div>
          <div>
            <a class="navigation--item link custom-btn" href="../main pages/search-result.php?cetegorie=tech">Tech</a>
          </div>
          <div>
            <a class="navigation--item link custom-btn" href="../main pages/search-result.php?cetegorie=news">News</a>
          </div>
          <div>
            <a class="navigation--item link custom-btn" href="../main pages/search-result.php?cetegorie=tips">Tips</a>
          </div>
          <div>
            <a class="navigation--item link custom-btn" href="../main pages/search-result.php?cetegorie=feautures">Feautures</a>
          </div>
          <div>
            <a class="navigation--item link custom-btn" href="../main pages/search-result.php?cetegorie=environnement">Environememnt</a>
          </div>
          <div>
            <a class="navigation--item link custom-btn" href="../main pages/search-result.php?cetegorie=podcasts">Podcasts</a>
          </div>
          <div>
            <a class="navigation--item link custom-btn" href="../main pages/search-result.php?cetegorie=videos">Videos</a>
          </div>
          <div>
            <a class="navigation--item link custom-btn" href="../main pages/search-result.php?cetegorie=documents">Documents</a>
          </div>
          <div>
            <a class="navigation--item menu-sign-up" href="../main pages/profile.php">Go to Profile <i class="bi bi-arrow-right"></i> </a>
          </div>
          <div>
            <a class="navigation--item " href="../main pages/about.php">about</a>
          </div>
          <div>
            <a class="navigation--item " href="../main pages/privacy-policy.php">Policies and reports</a>
          </div>
          <div>
            <a class="navigation--item " href="#">Become a publisher</a>
          </div>

          <div>
            <div class="social-media-menu-links">
                <div>
                  <a class="social-media-menu-links" href="#ByteBurstFacebook" title="Facebook"><i class="bi bi-facebook"></i></a>
                </div>
                <div>
                  <a class="social-media-menu-links" href="#ByteBurstTwitter" title="twitter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                      <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                    </svg>
                  </a>
                </div>
                <div>
                  <a class="social-media-menu-links" href="#ByteBurstInstagram" title="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
                <div>
                  <a class="social-media-menu-links" href="#ByteBurstYoutube" title="Youtube"><i class="bi bi-youtube"></i></a>
                </div>
                <div>
                  <a class="social-media-menu-links" href="#ByteBurstLunkedIn" title="Linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
                <div>
                  <a class="social-media-menu-links" href="#ByteBurstReddit " title="Reddit"><i class="bi bi-reddit"></i></a>
                </div>
                
              </div>
          </div>
          <div>
            <a class="legal-aspects" href="../main pages/terms-of-use.php">Terms of use</a>
          </div>
          <div>
            <a class="legal-aspects" href="../main pages/privacy-policy.php">Privacy</a>
          </div>
        </div>
      
    </div>
    <!--End Hamburger Menu navigation-->




  </div>

</nav>
