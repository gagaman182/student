<template>
  <v-container fluid>
    <div id="e3" style="max-width: 100%; margin: auto;" class="grey lighten-3">
      <v-toolbar color="pink">
        <v-toolbar-side-icon></v-toolbar-side-icon>
        <v-toolbar-title class="white--text">
          <v-icon dark>mdi-console</v-icon> COVID-19
        </v-toolbar-title>
        <v-spacer></v-spacer>
      </v-toolbar>
      <v-card>
        <v-container fluid style="min-height: 0;" grid-list-lg>
          <v-layout row wrap>
            <v-flex xs12>
              <v-card color="#e2979c" class="white--text">
                <v-card-title class="headline ">ข้อมูลนักเรียน</v-card-title>
              </v-card>
            </v-flex>
            <v-flex xs12>
              <v-card>
                <v-card-text> <div>ระบุวันที่ประเมิน</div></v-card-text>
                <v-container fluid grid-list-lg>
                  <v-layout row>
                    <v-flex xs12>
                      <v-container fluid grid-list-lg>
                        <v-layout row>
                          <v-flex xs12
                            ><div>
                              <v-col class="d-flex" cols="12">
                                <v-menu
                                  ref="menu"
                                  v-model="menu"
                                  :close-on-content-click="false"
                                  :return-value.sync="date"
                                  transition="scale-transition"
                                  offset-y
                                  min-width="290px"
                                >
                                  <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                      v-model="date"
                                      :rules="dateRules"
                                      label="วันที่ประเมิน"
                                      readonly
                                      v-bind="attrs"
                                      v-on="on"
                                      outlined
                                    ></v-text-field>
                                  </template>
                                  <v-date-picker
                                    v-model="date"
                                    no-title
                                    scrollable
                                    locale="th-CZ"
                                  >
                                    <v-spacer></v-spacer>
                                    <v-btn
                                      text
                                      color="primary"
                                      @click="menu = false"
                                      >Cancel</v-btn
                                    >
                                    <v-btn
                                      text
                                      color="primary"
                                      @click="$refs.menu.save(date)"
                                      >OK</v-btn
                                    >
                                  </v-date-picker>
                                </v-menu>
                              </v-col>
                            </div>
                          </v-flex>
                        </v-layout>
                      </v-container>
                    </v-flex>
                    <v-flex xs12
                      ><v-card-text>
                        <v-btn
                          class="mx-2"
                          fab
                          dark
                          large
                          color="#9BDEAC"
                          @click="idsearch"
                        >
                          <v-icon dark>mdi-account-search</v-icon>
                        </v-btn></v-card-text
                      >
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card>
            </v-flex>
            <v-flex xs12>
              <v-card>
                <v-card-text> </v-card-text>
                <v-container fluid grid-list-lg>
                  <v-layout row>
                    <v-flex xs12
                      ><div>
                        <v-simple-table>
                          <template v-slot:default>
                            <thead>
                              <tr>
                                <th class="text-left">ข้อมูล</th>
                                <th class="text-left">จำนวน(คน)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- <tr v-for="item in desserts" :key="item.name"> -->
                              <!-- <td>{{ item.name }}</td>
                              <td>{{ item.calories }}</td> -->
                              <tr>
                                <td>ชื่อโรงเรียน</td>
                                <td>โรงเรียน1</td>
                              </tr>
                              <tr>
                                <td>ระดับชั้น</td>
                                <td>ประถมศึกษา 1 ห้อง 2</td>
                              </tr>
                              <tr>
                                <td>วันที่ประเมิน</td>
                                <td>23/03/2020</td>
                              </tr>
                              <tr>
                                <td>จำนวนนักเรียนห้องในห้อง</td>
                                <td>50</td>
                              </tr>
                              <tr>
                                <td>จำนวนนักเรียนที่ประเมิน</td>
                                <td>48</td>
                              </tr>
                              <tr>
                                <td>จำนวนนักเรียนที่ไม่ประเมิน</td>
                                <td>2</td>
                              </tr>
                            </tbody>
                          </template>
                        </v-simple-table>
                      </div>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card>
    </div>
  </v-container>
</template>
<script>
// @ is an alias to /src

export default {
  name: "About",
  components: {},
  data() {
    return {
      date: "",
    };
  },
};
</script>
