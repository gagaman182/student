<template>
  <v-container fluid>
    <v-form v-model="isValid" ref="form">
      <div
        id="e3"
        style="max-width: 100%; margin: auto;"
        class="grey lighten-3"
      >
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
                  <v-card-subtitle class="white--text"
                    >แสดงผลข้อมูลนักเรียน</v-card-subtitle
                  >
                </v-card>
              </v-flex>
              <v-flex xs12>
                <v-card>
                  <v-card-text>
                    <div><h3>ระบุข้อมูลที่จะค้นหา</h3></div></v-card-text
                  >
                  <v-container fluid grid-list-lg>
                    <v-layout row>
                      <v-flex xs12>
                        <v-container fluid grid-list-lg>
                          <v-layout row>
                            <v-flex xs12 md12
                              ><div>
                                <v-col class="d-flex" cols="12">
                                  <v-dialog
                                    ref="dialog"
                                    v-model="modal"
                                    :return-value.sync="date"
                                    persistent
                                    width="290px"
                                  >
                                    <template v-slot:activator="{ on, attrs }">
                                      <v-text-field
                                        v-model="date"
                                        label="วันที่ประเมิน"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"
                                        outlined
                                        prepend-inner-icon="mdi-calendar"
                                      ></v-text-field>
                                    </template>
                                    <v-date-picker
                                      v-model="date"
                                      scrollable
                                      locale="th-CZ"
                                    >
                                      <v-spacer></v-spacer>
                                      <v-btn
                                        text
                                        color="primary"
                                        @click="modal = false"
                                        >ยกเลิก</v-btn
                                      >
                                      <v-btn
                                        text
                                        color="primary"
                                        @click="$refs.dialog.save(date)"
                                        >ตกลง</v-btn
                                      >
                                    </v-date-picker>
                                  </v-dialog>
                                </v-col>
                              </div>
                            </v-flex>
                            <v-flex xs12 md4
                              ><div>
                                <v-card-text>
                                  <v-select
                                    :items="schools"
                                    label="โรงเรียน"
                                    :rules="schoolRules"
                                    v-model="school"
                                    outlined
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
                            :disabled="!isValid"
                            fab
                            large
                            color="#9BDEAC"
                            @click="search_student"
                          >
                            <v-icon class="white--text" dark
                              >mdi-account-search</v-icon
                            >
                          </v-btn></v-card-text
                        >
                      </v-flex>
                    </v-layout>
                  </v-container>
                </v-card>
              </v-flex>
              <v-flex xs12>
                <v-card>
                  <v-card-text><h3>แสดงผล</h3> </v-card-text>
                  <v-container fluid grid-list-lg>
                    <v-layout row>
                      <v-flex xs12
                        ><div>
                          <v-simple-table>
                            <template v-slot:default>
                              <thead>
                                <tr>
                                  <th class="text-left"><h2>ข้อมูล</h2></th>
                                  <th class="text-left"><h2>จำนวน(คน)</h2></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr
                                  v-for="item in student_data"
                                  :key="item.num"
                                >
                                  <td><h3>ชื่อโรงเรียน</h3></td>
                                  <td>
                                    <h3>{{ item.schools }}</h3>
                                  </td>
                                </tr>
                                <tr
                                  v-for="item in student_data"
                                  :key="item.num"
                                >
                                  <td><h3>ระดับชั้น</h3></td>
                                  <td>
                                    <h3>
                                      {{ item.classes }} ห้อง {{ item.rooms }}
                                    </h3>
                                  </td>
                                </tr>
                                <tr
                                  v-for="item in student_data"
                                  :key="item.num"
                                >
                                  <td><h3>วันที่ประเมิน</h3></td>
                                  <td>
                                    <h3>{{ item.date | formatDate }}</h3>
                                  </td>
                                </tr>

                                <tr
                                  v-for="item in student_data"
                                  :key="item.num"
                                >
                                  <td><h3>จำนวนนักเรียนห้องในห้อง</h3></td>
                                  <td>
                                    <h3>{{ item.alls }}</h3>
                                  </td>
                                </tr>
                                <tr
                                  v-for="item in student_data"
                                  :key="item.num"
                                >
                                  <td><h3>จำนวนนักเรียนที่ประเมิน</h3></td>
                                  <td>
                                    <h3>{{ item.totals }}</h3>
                                  </td>
                                </tr>
                                <tr
                                  v-for="item in student_data"
                                  :key="item.num"
                                >
                                  <td><h3>ผ่านเกณฑ์</h3></td>
                                  <td>
                                    <h3>{{ item.ok }}</h3>
                                  </td>
                                </tr>
                                <tr
                                  v-for="item in student_data"
                                  :key="item.num"
                                >
                                  <td><h3>ไม่ผ่านเกณฑ์</h3></td>
                                  <td>
                                    <h3>{{ item.nook }}</h3>
                                  </td>
                                </tr>
                                <tr
                                  v-for="item in student_data"
                                  :key="item.num"
                                >
                                  <td><h3>จำนวนนักเรียนที่ไม่ประเมิน</h3></td>
                                  <td>
                                    <h3>{{ item.no_screen }}</h3>
                                  </td>
                                </tr>
                              </tbody>
                            </template>
                          </v-simple-table>
                          <v-card-text>
                            <v-btn
                              fab
                              large
                              :disabled="!isValid"
                              color="#9BDEAC"
                              @click="student_detail"
                            >
                              <v-icon dark class="white--text"
                                >mdi-format-list-bulleted-square</v-icon
                              >
                            </v-btn></v-card-text
                          >
                        </div>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </v-card>
              </v-flex>
              <v-dialog v-model="dialog" scrollable max-width="300px">
                <v-card>
                  <v-card-title>นักเรียนที่ไม่ประเมิน</v-card-title>
                  <v-divider></v-divider>
                  <v-card-text style="height: 300px;">
                    <v-simple-table>
                      <template v-slot:default>
                        <thead>
                          <tr>
                            <th class="text-left">13หลัก</th>
                            <th class="text-left">ชื่อ</th>
                            <th class="text-left">นามสกุล</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="item in student_select" :key="item.idcard">
                            <td>{{ item.idcard }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.lastname }}</td>
                          </tr>
                        </tbody>
                      </template>
                    </v-simple-table>
                  </v-card-text>
                  <v-divider></v-divider>
                  <v-card-actions>
                    <v-btn
                      class="white--text"
                      color="#e7305b"
                      flat
                      @click.native="dialog = false"
                      >ปิด</v-btn
                    >
                  </v-card-actions>
                </v-card>
              </v-dialog>
            </v-layout>
          </v-container>
        </v-card>

        <vm-back-top></vm-back-top>
      </div>
    </v-form>
  </v-container>
</template>
<script>
//database
import axios from "axios";
import { APIPath } from "../../service/APIPath";
const apiPath = new APIPath();
import moment from "moment";
//popup
import swal from "sweetalert";
export default {
  name: "About",
  components: {},
  data() {
    return {
      dialog: false,
      dialogm1: "",
      date: "",
      dateRules: [(v) => !!v || "วันที่ยังไม่ได้ระบุ"],
      isValid: true,
      school: "",
      school_select: "",
      schoolRules: [(v) => !!v || "โรงเรียนยังไม่ได้ระบุ"],
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
      classRules: [(v) => !!v || "ระดับชั้นยังไม่ได้ระบุ"],
      room: "",
      room_select: "",
      rooms: ["1", "2", "3", "4", "5", "7", "8", "9", "10"],
      roomRules: [(v) => !!v || "ห้องยังไม่ได้ระบุ"],
      student_data: "",
      student_select: "",
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

          if (this.student_data[0].date == this.date) {
            swal({
              title: "แจ้งเตือน",
              text:
                "ระบบค้นพบข้อมูลโรงเรียน" +
                " " +
                this.student_data[0].schools +
                " " +
                "ระดับชั้น" +
                " " +
                this.student_data[0].classes +
                " " +
                "ห้อง" +
                " " +
                this.student_data[0].rooms,
              icon: "success",
              button: "ปิด",
            });
          }
        });
    },
    student_detail() {
      this.dialog = true;
      axios
        .get(`${apiPath.getBaseUrl()}student_select.php`, {
          params: {
            school: this.school,
            classselect: this.classselect,
            room: this.room,
          },
        })
        .then((response) => {
          this.student_select = response.data;
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
