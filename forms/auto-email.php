


<div class="auto-email-container">
  <div class="inner-auto-email">
    <div class=" auto-email">
      <div class="logo">
          <div class="logo ">
            <a href="." ><img src="../images/Screenshot 2023-12-31 142934.png" class="logo" alt="logo" ></a>
          </div>
      </div>
      <h2> 
        <span >Join Our Newsletter</span>
        Propaganda Free , Original Media. Delivered to you.
      </h2>
      <form action="fine-name.php" method="POST">
        <div class="user-box">
              <input type="email" class="email-sec" id="email-sec" name="email" placeholder="Enter your email address"  required>
        </div>
        <div class="user-box">
                <input class="agree-sec" type="checkbox" name="agree" id="agree-sec">
                <h4>By signing up, I agree to receive emails from <a href="../main pages/index.php">ByteBurst</a>  
                and to the <a href="../main pages/privacy-policy.php">Privacy Policy</a>  and 
                <a href="../main pages/terms-of-use.php">Terms of Use</a>.</h4>
        </div>
        <div class="user-box">
            <button id="submit-sec" type="submit-sec" class="submit-sec">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

    

<script>
    let email = document.getElementById("email-sec");
    let agree = document.getElementById("agree-sec");
    let submit = document.getElementById("submit-sec");

    submit.style.opacity = 0.5;

    function updateSubmitButtonOpacity() {
      var emailValue = email.value;
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;



      if (emailValue.trim() !== "" && emailRegex.test(emailValue) && agree.checked) {
        submit.style.opacity = 1;
      } else {
        submit.style.opacity = 0.5;
      }
    }

    email.addEventListener("input", updateSubmitButtonOpacity);
    agree.addEventListener("change", updateSubmitButtonOpacity);
</script>