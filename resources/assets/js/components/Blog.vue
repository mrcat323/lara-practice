<template>
    <div>
      <div class="container">

        <div class="blog-header">
          <h1 class="blog-title">The Bootstrap Blog</h1>
          <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
        </div>
        <div class="loading" v-if="loading">Loading...</div>
        <div class="row" v-else-if="posts">
          <div class="buttons">
            <router-link :to="{ name: 'post-create' }" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Post</router-link>
          </div>
          <div class="col-sm-8 blog-main">

            <div class="blog-post" v-for="post in posts">
              <h2 class="blog-post-title">{{ post.title }}</h2>
              <p class="blog-post-meta">{{ post.created_at }} by <a href="#">Mark</a> <router-link :to="{ name: 'post-edit', params: {id: post.id} }"><i class="fa fa-pencil-alt"></i></router-link>
              <delete-button :post-id="post.id" @action="deletePost"></delete-button></p>
              <p v-html="post.desc"></p>
            </div><!-- /.blog-post -->
            <nav>
              <ul class="pager">
                <li><a href="#">Previous</a></li>
                <li><a href="#">Next</a></li>
              </ul>
            </nav>

          </div><!-- /.blog-main -->

          <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
              <h4>About</h4>
              <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="sidebar-module">
              <h4>Archives</h4>
              <ol class="list-unstyled">
                <li><a href="#">March 2014</a></li>
                <li><a href="#">February 2014</a></li>
                <li><a href="#">January 2014</a></li>
                <li><a href="#">December 2013</a></li>
                <li><a href="#">November 2013</a></li>
                <li><a href="#">October 2013</a></li>
                <li><a href="#">September 2013</a></li>
                <li><a href="#">August 2013</a></li>
                <li><a href="#">July 2013</a></li>
                <li><a href="#">June 2013</a></li>
                <li><a href="#">May 2013</a></li>
                <li><a href="#">April 2013</a></li>
              </ol>
            </div>
            <div class="sidebar-module">
              <h4>Elsewhere</h4>
              <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
              </ol>
            </div>
          </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

      </div>

      <footer class="blog-footer" v-if="!loading">
        <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
          <a href="#">Back to top</a>
        </p>
      </footer>
    </div><!-- /.container -->
</template>

<script>
import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.component('delete-button', {
  props: ['postId'],
  template:
    '<button class="btn btn-danger" @click="$emit(\'action\', postId)"><i class="fa fa-trash"></i></button>',
});

Vue.use(VueResource)

export default {
  data() {
    return {
      posts: [],
      loading: true
    }
  },
  methods: {
    getPosts() {
      let self = this;
      Vue.http.get('/api/blog/get').then(function (response) {
        self.posts = response.data.posts;
        self.loading = false;
      }, function (error) {
        throw error;
      });
    },
    deletePost(postId) {
      Vue.http.post('/api/post/delete', {id: postId}).then(function (response) {
        this.getPosts();
      }, function (error) {
        throw error;
      });
    }
  },
  created() {
    this.getPosts();
  }
}
</script>
