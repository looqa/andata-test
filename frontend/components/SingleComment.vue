<script setup lang="ts">
const props = defineProps({
  comment: Object
})

</script>

<template>
  <v-card variant="outlined" class="pa-4">
    <v-row no-gutters>
      <v-col cols="auto">
        <v-avatar size="40">
          <v-img src="https://via.placeholder.com/40"></v-img>
        </v-avatar>
      </v-col>
      <v-col>
        <div class="d-flex pt-2 pl-3 justify-space-between align-center">
          <div>
          <span class="font-weight-bold">{{comment.user_name}}</span>
            <span class="font-weight-light"> ({{comment.user_email}})</span>
          </div>
           <span class="font-weight-light">{{comment.created_at}}</span>
        </div>
      </v-col>
    </v-row>
    <v-divider class="my-4"></v-divider>
    <div>
      <div class="font-weight-bold">{{comment.title}}</div>
      <div class="mt-2">{{comment.body}}</div>
    </div>
  </v-card>
</template>

<style scoped>

</style>