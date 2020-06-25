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
                <v-card-text> <div>ระบุข้อมูลที่จะค้นหา</div></v-card-text>
                <v-container fluid grid-list-lg>
                  <v-layout row>
                    <v-flex xs12>
                      <v-container fluid grid-list-lg>
                        <v-layout row>
                          <v-flex xs12 md12
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
                          <v-flex xs12 md4
                            ><div>
                              <v-card-text>
                                <v-select
                                  :items="schools"
                                  label="โรงเรียน"
                                  outlined
                                  v-model="school"
                                ></v-select>
                              </v-card-text>
                            </div>
                          </v-flex>
                          <v-flex xs12 md4
                            ><div>
                              <v-card-text>
                                <v-select
                                  :items="classes"
                                  label="ระดับชั้น"
                                  :rules="classRules"
                                  v-model="classselect"
                                  outlined
                                ></v-select>
                              </v-card-text>
                            </div>
                          </v-flex>
                          <v-flex xs12 md4
                            ><div>
                              <v-card-text>
                                <v-select
                                  :items="rooms"
                                  label="ห้อง"
                                  :rules="roomRules"
                                  v-model="room"
                                  outlined
                                ></v-select
                              ></v-card-text>
                            </div>
                          </v-flex>
                        </v-layout>
                      </v-container>
                    </v-flex>
                    <v-flex xs12 md4
                      ><v-card-text>
                        <v-btn
                          class="mx-2"
                          fab
                          dark
                          large
                          color="#9BDEAC"
                          @click="search_student"
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
                              <tr v-for="item in student_data" :key="item.num">
                                <td>ชื่อโรงเรียน</td>
                                <td>{{ item.schools }}</td>
                              </tr>
                              <tr v-for="item in student_data" :key="item.num">
                                <td>ระดับชั้น</td>
                                <td>
                                  {{ item.classes }} ห้อง
                                  {{ item.rooms }}
                                </td>
                              </tr>
                              <tr v-for="item in student_data" :key="item.num">
                                <td>วันที่ประเมิน</td>
                                <td>{{ item.date | formatDate }}</td>
                              </tr>

                              <tr v-for="item in student_data" :key="item.num">
                                <td>จำนวนนักเรียนห้องในห้อง</td>
                                <td>{{ item.alls }}</td>
                              </tr>
                              <tr v-for="item in student_data" :key="item.num">
                                <td>จำนวนนักเรียนที่ประเมิน</td>
                                <td>{{ item.totals }}</td>
                              </tr>
                              <tr v-for="item in student_data" :key="item.num">
                                <td>ผ่านเกณฑ์</td>
                                <td>{{ item.ok }}</td>
                              </tr>
                              <tr v-for="item in student_data" :key="item.num">
                                <td>ไม่ผ่านเกณฑ์</td>
                                <td>{{ item.nook }}</td>
                              </tr>
                              <tr v-for="item in student_data" :key="item.num">
                                <td>จำนวนนักเรียนที่ไม่ประเมิน</td>
                                <td>{{ item.no_screen }}</td>
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
//database
import axios from "axios";
import { APIPath } from "../../service/APIPath";
const apiPath = new APIPath();
import moment from "moment";
export default {
  name: "About",
  components: {},
  data() {
    return {
      date: "",
      isValid: true,
      school: "",
      school_select: "",
      schools: ["โรงเรียน1", "โรงเรียน2", "โรงเรียน3", "โรงเรียน4"],
      classselect: "",
      classselect_select: "",
      classes: [
        "อนุบาล 1",
        "อนุบาล 2",
        "อนุบาล 3",
        "ประถมศึกษา 1",
        "ประถมศึกษา 2",
        "ประถมศึกษา 3",
        "ประถมศึกษา 4",
        "ประถมศึกษา 5",
        "ประถมศึกษา 6",
        "มัธยมศึกษา 1",
        "มัธยมศึกษา 2",
        "มัธยมศึกษา 3",
        "มัธยมศึกษา 4",
        "มัธยมศึกษา 5",
        "มัธยมศึกษา 6",
      ],
      room: "",
      room_select: "",
      rooms: ["1", "2", "3", "4", "5", "7", "8", "9", "10"],
      student_data: "",
    };
  },
  methods: {
    search_student() {
      axios
        .get(`${apiPath.getBaseUrl()}home_select.php`, {
          params: {
            date: this.date,
            school: this.school,
            classselect: this.classselect,
            room: this.room,
          },
        })
        .then((response) => {
          this.student_data = response.data;
        });
    },
  },
  filters: {
    formatDate: function(value) {
      if (value) {
        return moment(String(value)).format("MM/DD/YYYY");
      }
    },
  },
};
</script>
