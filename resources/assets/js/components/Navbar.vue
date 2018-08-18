<template>
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills pull-right">
        <li role="presentation" class="active"><router-link :to="{ name: 'home' }">Home</router-link></li>
        <li role="presentation"><router-link :to="{ name: 'info' }">About</router-link></li>
        <li role="presentation"><router-link :to="{ name: 'blog' }">Blog</router-link></li>
      </ul>
    </nav>
    <h3 class="text-muted">Lara-Practice</h3>
  </div>
</template>

<script>
export default {}
</script>
