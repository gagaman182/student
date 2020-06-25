<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
    >
      <v-list dense>
        <template v-for="item in items">
          <v-list-item :key="item.text" :to="item.link" link>
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                {{ item.text }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      color="#0A97B0"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <!-- <v-toolbar-title class="ml-0 pl-4">
        <span class="hidden-sm-and-down"
          >กลุ่มงานเวชกรรมสังคม โรงพยาบาลหาดใหญ่</span
        >
      </v-toolbar-title> -->

      <v-spacer></v-spacer>
      กลุ่มงานเวชกรรมสังคม โรงพยาบาลหาดใหญ่

      <!-- <v-btn to="/" icon> <v-icon>mdi-motorbike</v-icon> </v-btn> -->
      <!-- <v-btn to="/about" icon>
        <v-icon>mdi-weight-kilogram</v-icon>
      </v-btn> -->
    </v-app-bar>
    <v-main>
      <v-container>
        <v-row>
          <router-view />
        </v-row>
      </v-container>
    </v-main>

    <!-- <v-bottom-navigation v-model="bottomNav">
      <v-btn value="recent">
        <span>Recent</span>
        <v-icon>mdi-history</v-icon>
      </v-btn>

      <v-btn value="favorites">
        <span>Favorites</span>
        <v-icon>mdi-heart</v-icon>
      </v-btn>

      <v-btn value="nearby">
        <span>Nearby</span>
        <v-icon>mdi-map-marker</v-icon>
      </v-btn>
    </v-bottom-navigation> -->

    <!-- <v-footer padless color="#0A97B0">
      <v-col class="text-center white--text" cols="12">
        {{ new Date().getFullYear() }} —
        <strong>กลุ่มงานเวชกรรมสังคม โรงพยาบาลหาดใหญ่</strong>
      </v-col>
    </v-footer> -->
  </v-app>
</template>

<script>
export default {
  props: {
    source: String,
  },
  data: () => ({
    drawer: false,
    items: [
      {icon: 'mdi-clipboard-account', text: 'ประวัติ', link: '/person'},
      {icon: 'mdi-hospital-building', text: 'แบบฟอร์ม', link: '/'},
      {icon: 'mdi-console', text: 'ผลการประเมิน', link: '/data'},
    ],
  }),
};
</script>
