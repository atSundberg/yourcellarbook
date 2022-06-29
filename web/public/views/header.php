<section class="section">

        <div class="columns">
          <div class="column is-one-fifth">
                
            </div>
            <div class="column">
                <h1 class="title">
                    Adams wine
                </h1>
            </div>
            <div class="column is-one-fifth">
                <figure class="image  is-96x64">
                    <img src="assets/morgan-housel-PcDGGex9-jA-unsplash.jpg">
                </figure>
            </div>
        </div>

        <div class="tabs">
            <ul>
                <li @click="selPage = 'home'" :class="selPage == 'home'    ? 'is-active' : ''"><a>Home</a></li>
                <li @click="selPage = 'about'" :class="selPage == 'about'   ? 'is-active' : ''"><a>About</a></li>
                <li @click="selPage = 'contact'" :class="selPage == 'contact' ? 'is-active' : ''"><a>Contact</a></li>
                <li @click="selPage = 'privpol'" :class="selPage == 'privpol' ? 'is-active' : ''"><a>Privacy Policy</a></li>
                <li @click="selPage = 'terms'" :class="selPage == 'terms'   ? 'is-active' : ''"><a>Terms and Conditions</a></li>
            </ul>
        </div>
    <!--    - - >
    <p>selPage:<span x-text="selPage">p-span</span></p>
< ! - - -->
</section>