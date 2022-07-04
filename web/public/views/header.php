<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="http://yourcellarbook.com">
      <!-- <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28"> -->
      <img src="assets/images/YourCellarBook_Logo_v3.png" alt="Your Cellar Book - Logo" style="max-height: 70px">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-end">
      <a class="navbar-item">
        How It Works
      </a>
      
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-link">
              <strong>Sign up</strong>
            </a>
            <a class="button is-outlined is-link">
              Log in
            </a>
            <!-- This includes an icon: -->
            <!-- <a class="button is-medium">
              <span class="icon">
                <i class="fas fa-heading fa-lg"></i>
              </span>
            </a> -->
          </div>
        </div>
      </div>
    </div>
  </div>



</nav>

<section class="section">

  <!-- <div class="columns is-vcentered is-centered">
          
            <div class="column has-text-centered">
                <h1 class="title">
                    Your Cellar Book
                </h1>
                <h3 class="subtitle">
                    Keep track of your wine collection
                </h3>
            </div>
             <div class="column is-one-fifth">
                <figure class="image  is-96x64">
                    <img src="assets/morgan-housel-PcDGGex9-jA-unsplash.jpg">
                </figure>
            </div>
        </div> -->

  <div class="tabs is-centered">
    <ul>
      <!-- <li @click="selPage = 'home'" :class="selPage == 'home'    ? 'is-active' : ''"><a>Home</a></li> -->
      <li @click="selPage = 'home'" :class="selPage == 'home'    ? 'is-active' : ''"><a>View Full Collection</a></li>
      <li @click="selPage = 'about'" :class="selPage == 'about'   ? 'is-active' : ''"><a>Add Wine</a></li>
      <!-- <li @click="selPage = 'contact'" :class="selPage == 'contact' ? 'is-active' : ''"><a>Contact</a></li>
      <li @click="selPage = 'privpol'" :class="selPage == 'privpol' ? 'is-active' : ''"><a>Privacy Policy</a></li>
      <li @click="selPage = 'terms'" :class="selPage == 'terms'   ? 'is-active' : ''"><a>Terms and Conditions</a></li> -->
    </ul>
  </div>
  <!--    - - >
    <p>selPage:<span x-text="selPage">p-span</span></p>
< ! - - -->
</section>