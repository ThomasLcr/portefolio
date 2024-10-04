<template>
  <v-footer height="80" app style="z-index: 2;"> 
    <a
      v-for="item in items"
      :key="item.title"
      :href="item.href"
      :title="item.title"
      class="d-inline-block mx-2 social-link"
      rel="noopener noreferrer"
      target="_blank"
    >
      <v-icon :icon="item.icon" :size="34" />
    </a>

    <div class="text-caption text-disabled" >
      <span class="d-none d-sm-inline-block" style="font-size: medium;">&copy 2024 Lacroix Thomas. All rights reserved.</span>
    </div>
  </v-footer>
</template>

<script setup>
  const items = [
    {
      title: 'My Linkedin',
      icon: 'mdi-linkedin',  // Icône LinkedIn
      href: 'https://www.linkedin.com/in/thomas-lacroix30/',
    },
    {
      title: 'My GitHub',
      icon: 'mdi-github',
      href: 'https://github.com/ThomasLcr',
    },
  ]
</script>

<style scoped lang="sass">
  .social-link :deep(.v-icon)
    color: white
    text-decoration: none
    transition: .2s ease-in-out

    &:hover
      color: rgba(25, 118, 210, 1)
</style>
