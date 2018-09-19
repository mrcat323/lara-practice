<template>
  <div>
    <div class="container">
      <div class="jumbotron">
        <h1 class="text-center">{{ header }}</h1>
        <p>{{ about }}</p>
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
export default {
  data() {
    return {
      header: 'About',
      about: 'Project was created just for practice, for practicing knowledge of Laravel + Vue JS. The project will be updated, should add new features, new stuff that you could enjoy it.'
    }
  }
}
</script>
