<template>
  <div id="app">
    <v-app id="inspire">
      <v-layout row justify-center>
        <v-toolbar
          app
          dark
          color="blue-grey darken-1"
          class="hidden-xs-and-down"
        >
          <v-toolbar-title
            >แบบฟอร์มประเมินตัวเองเฝ้าระวังการติดเชื้อไวรัสโคโรน่า
            2019</v-toolbar-title
          >
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              v-for="item in nav"
              :key="item.icon"
              :to="item.link"
              :title="item.title"
              flat
              >{{ item.text }}</v-btn
            >
          </v-toolbar-items>
        </v-toolbar>
        <v-container fluid grid-list-xl>
          <v-layout row justify-space-between>
            <v-flex xs2> </v-flex>
            <v-flex xs2>
              <router-view />
            </v-flex>
            <v-flex xs2> </v-flex>
          </v-layout>
        </v-container>
      </v-layout>
    </v-app>
  </div>
</template>

<script>
export default {
  name: 'App',

  data() {
    return {
      dialog: false,
      nav: [
        {
          icon: 'home',
          text: 'Home',
          title: 'Back to Home page',
          active: true,
          link: '/',
        },
        {
          icon: 'info',
          text: 'About',
          title: 'About this demo',
          active: false,
          link: '/about',
        },
      ],
    };
  },
};
</script>
