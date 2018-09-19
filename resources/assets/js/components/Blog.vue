<template>
    <div>
      <div class="container">

        <div class="blog-header">
          <h1 class="blog-title">The Blog page</h1>
          <p class="lead blog-description">Write/Delete/Edit/Watch your posts in your blog</p>
        </div>
        <div class="loading" v-if="loading">Loading...</div>
        <div class="row" v-else-if="posts">
          <div class="buttons">
            <router-link :to="{ name: 'post-create' }" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Post</router-link>
          </div>
          <div class="col-sm-8 blog-main">

            <div class="blog-post" v-for="post in posts">
              <h2 class="blog-post-title"><router-link :to="{ name: 'post', params: {id: post.id} }">{{ post.title }}</router-link></h2>
              <p class="blog-post-meta">{{ post.created_at }} by <a href="#">Mark</a> <router-link :to="{ name: 'post-edit', params: {id: post.id} }"><i class="fa fa-pencil-alt"></i></router-link>
              <delete-button :post-id="post.id" @action="deletePost"></delete-button></p>
              <p v-html="post.desc"></p>
            </div><!-- /.blog-post -->
          </div><!-- /.blog-main -->

          <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
              <h4>About</h4>
              <p>Project was created just for practice, for practicing knowledge of Laravel + Vue JS. The project will be updated, should add new features, new stuff that you could enjoy it.</p>
            </div>

            <div class="sidebar-module">
              <h4>Elsewhere</h4>
              <ol class="list-unstyled">
                <li><a target="_blank" href="https://github.com/mrcat323">GitHub</a></li>
                <li><a target="_blank" href="https://twitter.com/mrcat323">Twitter</a></li>
                <li><a target="_blank" href="https://t.me/mrcat323">Telegram</a></li>
              </ol>
            </div>
          </div><!-- /.blog-sidebar -->

        </div><!-- /.row -->

      </div>

      <footer class="blog-footer" v-if="!loading">
        <p>&copy; Copyright 2018 Made with <i class="fa fa-heart"></i> by Mr. CaT</p>
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
      let self = this;
      Vue.http.post('/api/post/delete', {id: postId}).then(function (response) {
        self.getPosts();
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
