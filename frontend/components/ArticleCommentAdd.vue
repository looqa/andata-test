<script setup lang="ts">
import {ref} from "vue";
const emit = defineEmits(['addComment'])
const form = ref(null)
const userName = ref('')
const userEmail = ref('')
const commentTitle = ref('')
const commentBody = ref('')
const submitForm = () => {
  if (userName.value === "" || userEmail.value === "" || commentTitle.value === "" || commentBody.value === "") {
    alert("Заполнены не все поля.");
  } else if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(userEmail.value)) {
    alert("Неверно указан e-mail адрес.");
  } else {
    emit('addComment', {user_name: userName.value, user_email: userEmail.value, title: commentTitle.value, body: commentBody.value})
    userName.value = ''
    userEmail.value = ''
    commentTitle.value = ''
    commentBody.value = ''
  }
}

</script>

<template>
  <v-row class="mt-3 mb-2">
    <v-col cols="12">
    <div class="font-weight-bold">
      Оставить свой комментарий
    </div>
    </v-col>
    <v-col cols="12">
  <v-form ref="form" @submit.prevent="submitForm">
    <div class="d-flex flex-column">
      <v-row no-gutters >
        <v-col cols="6">
          <text-field v-model="userName" label="Имя"></text-field>
        </v-col>
        <v-col cols="6">
          <text-field v-model="userEmail" label="E-mail"></text-field>
        </v-col>
      </v-row>
      <v-row no-gutters>
        <v-col>
          <text-field v-model="commentTitle" label="Заголовок комментария"></text-field>
        </v-col>
      </v-row>
      <v-row no-gutters>
        <v-col>
          <v-textarea v-model="commentBody" label="Содержание"></v-textarea>
        </v-col>
      </v-row>
      <v-row no-gutters>
        <v-col>
          <v-btn type="submit">Отправить</v-btn>
        </v-col>
      </v-row>
    </div>
  </v-form>
    </v-col>
  </v-row>
</template>

<style scoped>

</style>