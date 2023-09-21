<script setup lang="ts">
import useScreenWidth from "../../composables/screen";
import {usePublicStore} from "../../stores/publicStore";

const screenWidth = useScreenWidth()

const store = usePublicStore()
</script>

<template>
<v-app-bar>
  <template v-slot:title>
    <v-icon size="80" class="mr-5">
      <logo></logo>
    </v-icon>
    <span class="font-weight-bold">{{store.pageTitle}}</span>
  </template>
  <template v-slot:append>
    <div v-if="screenWidth > 700">
    <v-btn text="dolor" href="#"></v-btn>
    <v-btn text="sit" href="#"></v-btn>
    <v-btn text="amet" href="#"></v-btn>
    </div>
    <v-menu v-else>
      <template v-slot:activator="{props}">
        <v-app-bar-nav-icon v-bind="props">
        </v-app-bar-nav-icon>
      </template>
      <v-list>
        <v-list-item title="dolor" href="#">

        </v-list-item>
        <v-list-item title="sit" href="#">

        </v-list-item>
        <v-list-item title="amet" href="#">

        </v-list-item>
      </v-list>
    </v-menu>

  </template>
</v-app-bar>
</template>

<style scoped>

</style>