<template>
    <div class="response" v-if="response">
      <div class="alert alert-success">The post have been successfully edited!</div>
      <div class="blog-post">
        <h2 class="blog-post-title">{{ post.title }}</h2>
        <p class="blog-post-meta">{{ post.updated_at }} by <a href="#">Mark</a></p>

        <p v-html="post.desc"></p>
      </div><!-- /.blog-post -->
    </div>
    <div class="delete" v-else-if="del">
      <div class="alert alert-success">The post have been successfully deleted!</div>
    </div>
    <div class="error-404" v-else-if="error">
      <div class="jumbotron">
        <h2 class="text-center">Error 404 Not Found</h2>
      </div>
    </div>
    <div class="form-sender" v-else-if="edit">
      <div class="form-group">
        <label >Title</label>
        <input type="text" class="form-control" v-model="post.title">
      </div>
      <div class="form-group">
        <label for="desc">Description</label>
        <textarea class="form-control" v-model="post.desc" rows="8" cols="80"></textarea>
      </div>
      <button class="btn btn-lg btn-primary" @click="editPost">Done</button>
      <button class="btn btn-lg btn-danger" @click="deletePost"><i class="fa fa-trash"></i></button>
    </div>
</template>

<script>
import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource)

export default {
  data() {
    return {
      post: {},
      edit: true,
      del: false,
      error: false,
      response: false
    }
  },
  methods: {
    grabPost(postId) {
        let self = this,
            url = '/api/post/edit/' + postId;

        Vue.http.get(url).then(function (response) {
          const result = response.data.object;
          self.post = result;
        }, function (error) {
          self.error = true;
        });
    },
    editPost() {
      let self = this,
          post = self.post;

      Vue.http.post('/api/post/store', {id: post.id, title: post.title, desc: post.desc}).then(function (response) {
        self.edit = false;
        self.response = true;
      }, function (error) {
        throw error;
      })
    },
    deletePost() {
      let self = this,
          post = self.post;

      Vue.http.post('/api/post/delete', {id: post.id}).then(function (response) {
        self.edit = false;
        self.del = true;
      }, function (error) {
        throw error;
      });
    }
  },
  created() {
    let postId = this.$route.params.id;
    this.grabPost(postId);
  }
}
</script>
