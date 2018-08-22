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
      <button class="btn btn-lg btn-primary" @click="createPost">Done</button>
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
    createPost() {
      let self = this,
          post = self.post;
      Vue.http.post('/api/post/create', {id: post.id, title: post.title, desc: post.desc}).then(function (response) {
        console.log(response);
      }, function (error) {
        throw error;
      })
    }
  }
}
</script>
