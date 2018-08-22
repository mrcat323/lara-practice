<template>
    <div class="form-sender">
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
      post: {}
    }
  },
  methods: {
    grabPost(postId) {
        var self = this,
            url = '/api/post/edit/' + postId;
        Vue.http.get(url).then(function (response) {
          const result = response.data.object;
          self.post = result;
        }, function (error) {
          throw error;
        });
    },
    editPost() {
      let self = this,
          post = self.post;
      Vue.http.post('/api/post/store', {id: post.id, title: post.title, desc: post.desc}).then(function (response) {
        console.log(response);
      }, function (error) {
        throw error;
      })
    },
    deletePost() {
      let self = this,
          post = self.post;

      Vue.http.post('/api/post/delete', {id: post.id}).then(function (response) {
        console.log(response);
      }, function (error) {
        throw error;
      });
    }
  },
  created() {
    var postId = this.$route.params.id;
    this.grabPost(postId);
    //alert(postId);
  }
}
</script>
