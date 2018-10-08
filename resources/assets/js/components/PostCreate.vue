<template>
    <div class="response" v-if="response">
      <div class="alert alert-success">The post have been successfully created!</div>
      <div class="blog-post">
        <h2 class="blog-post-title">{{ post.title }}</h2>
        <p class="blog-post-meta">{{ date }} by <a href="#">Mark</a></p>

        <p v-html="post.desc"></p>
      </div><!-- /.blog-post -->
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
      <button class="btn btn-lg btn-primary" @click="createPost">Done</button>
    </div>
</template>

<script>
import Vue from 'vue'
import VueResource from 'vue-resource'
import dayjs from 'dayjs'

Vue.use(VueResource)

export default {
  data() {
    return {
      post: {},
      response: false,
      edit: true
    }
  },
  methods: {
    createPost() {
      let self = this,
          post = self.post;
      Vue.http.post('/api/post/create', {id: post.id, title: post.title, desc: post.desc}).then(function (response) {
        self.edit = false;
        self.response = true;
      }, function (error) {
        throw error;
      });
    }
  },
  computed: {
    date() {
      dayjs(Date.now());
      let converted = dayjs().year() + '-' + dayjs().month() + '-' + dayjs().date() + ' ' + dayjs().hour() + ':' + dayjs().minute() + ':' + dayjs().second();
      return converted;
    }
  }
}
</script>
