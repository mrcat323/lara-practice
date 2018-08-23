<template>
  <div>
    <router-link class="btn btn-lg btn-default" :to="{ name: 'blog' }"><i class="fa fa-arrow-left"></i> </router-link>
    <div class="post-view" v-if="!error">
      <div class="blog-post">
        <h2 class="blog-post-title">{{ post.title }}</h2>
        <p class="blog-post-meta">{{ post.created_at }} by <a href="#">Mark</a></p>

        <p v-html="post.desc"></p>
      </div><!-- /.blog-post -->
    </div>
    <div class="error-404" v-else-if="error">
      <div class="jumbotron">
        <h2 class="text-center">Error 404 Not Found</h2>
      </div>
    </div>
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
      error: false
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
  },
  created() {
    let postId = this.$route.params.id;
    this.grabPost(postId);
  }
}
</script>

<style lang="css">
</style>
