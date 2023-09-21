<script setup lang="ts">

import SocialButton from "../SocialButton.vue";
</script>

<template>
<v-footer app elevation="2" absolute color="blue-grey-darken-4">
<v-row>
  <v-col cols="4">
    <v-icon size="70">
      <logo-footer></logo-footer>
    </v-icon>
  </v-col>
  <v-col cols="4"></v-col>
  <v-col cols="4" class="d-flex justify-end align-center">
    <social-button href="https://t.me/new_ai_marketing">
      <template v-slot:svg>
        <telegram></telegram>
      </template>
    </social-button>
    <social-button href="https://www.youtube.com/channel/UCwQVupjziD6iSnwZO1ITN5g">
      <template v-slot:svg>
        <youtube></youtube>
      </template>
    </social-button>
  </v-col>
</v-row>
</v-footer>
</template>

<style scoped>

</style>