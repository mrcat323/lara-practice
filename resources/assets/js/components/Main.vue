<template>
  <div>
    <div class="container">
        <div class="jumbotron">
          <h1>Hello World!</h1>
          <p class="lead">Welcome to our website! This website was developed with Laravel and Vue JS, that's why looks pretty cool.</p>
          <p><router-link class="btn btn-lg btn-success" :to="{ name: 'info' }" role="button">About Us</router-link></p>
        </div>

        <div class="row marketing">
          <div class="col-lg-6">
            <h4>Why Lara-Practice ?</h4>
            <p>It called Lara-Practice because of practicing Laravel PHP Framework.</p>

            <h4>What is this ?</h4>
            <p>It's a reactive app, you can pleasure by using it.</p>

            <h4>What is all for ?</h4>
            <p>The project was created for just practice Laravel and Vue JS skills.</p>
          </div>

          <div class="col-lg-6">
            <h4>Why Open Source ?</h4>
            <p>Because everyone could change something for something useful or fixed bug and pull requested, wrote issues, check that out.</p>

            <h4>Why Laravel ?</h4>
            <p>Because Laravel is great/cool PHP Framework, everyone likes that.</p>

            <h4>Why Vue JS ?</h4>
            <p>Because this miracle stuff makes almost everything reactive.</p>
          </div>
        </div>
      </div>
      <footer class="blog-footer">
        <p>&copy; Copyright 2018 Made with <i class="fa fa-heart"></i> by Mr. CaT</p>
        <p>
          <a href="#">Back to top</a>
        </p>
      </footer>
    </div>
</template>

<script>
export default {}
</script>
