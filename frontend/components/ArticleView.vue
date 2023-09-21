<script setup lang="ts">
import {useArticleStore} from "../stores/articleStore";
import {usePublicStore} from "../stores/publicStore";

const props = defineProps({
  article: Object
})
const pub = usePublicStore()
pub.setPageTitle(props.article.title)
const store = useArticleStore()
store.set(props.article)

const addComment = async (ev) => {
  store.sendComment(ev)
      .then(() => {
        alert('Комментарий успешно отправлен.')
      })
}
</script>

<template>

  <v-row>
    <v-col>
    <h1>{{store.article.title}}</h1>
    <div class="text-blue-grey-darken-3 mt-1 mb-3">{{store.article.created_at}}</div>
    <div v-html="store.article.body"></div>
    </v-col>
      <v-divider></v-divider>
    <v-col>
      <h3>Комментарии</h3>
      <article-comment-add @add-comment="addComment"></article-comment-add>
      <v-row class="mt-2">
        <v-col :cols="12" v-for="comment in store.article.comments">
          <single-comment :comment="comment"></single-comment>
        </v-col>
      </v-row>
    </v-col>
  </v-row>

</template>

<style scoped>

</style>