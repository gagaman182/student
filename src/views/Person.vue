<template>
  <v-container fluid>
    <div id="e3" style="max-width: 100%; margin: auto;" class="grey lighten-3">
      <v-toolbar color="#e7305b">
        <v-toolbar-side-icon></v-toolbar-side-icon>
        <v-toolbar-title class="white--text">
          <v-icon dark>mdi-clipboard-account</v-icon> COVID-19
        </v-toolbar-title>
        <v-spacer></v-spacer>
      </v-toolbar>
      <v-card>
        <v-container fluid style="min-height: 0;" grid-list-lg>
          <v-layout row wrap>
            <v-form v-model="isValid" ref="form">
              <v-flex xs12>
                <v-card color="#e2979c" class="white--text">
                  <v-card-title class="headline ">ประวัตินักเรียน</v-card-title>

                  <v-card-subtitle class="white--text"
                    >ข้อมูลนักเรียน</v-card-subtitle
                  >
                </v-card>
              </v-flex>

              <!-- 1 -->
              <v-flex xs12>
                <v-card>
                  <v-card-text>
                    <v-avatar color="#0A97B0" size="36">
                      <span class="white--text headline">1</span>
                    </v-avatar>
                    <div><h3>ข้อมูลทั่วไป</h3></div>
                  </v-card-text>
                  <v-container fluid grid-list-lg>
                    <v-layout row>
                      <v-flex xs12
                        ><div>
                          <v-card-title primary-title>
                            <div class="headline"></div>

                            <v-text-field
                              type="number"
                              v-model="idcard"
                              :counter="max"
                              :rules="idcardRules"
                              label="เลขประจำตัวประชาชน 13 หลัก"
                              :height="20"
                              outlined
                              prepend-inner-icon="mdi-nature-people"
                            ></v-text-field>
                          </v-card-title>
                        </div>
                      </v-flex>
                      <v-flex xs12 md6
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="name"
                              :rules="nameRules"
                              label="ชื่อ"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md6
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="lastname"
                              :rules="lastnameRules"
                              label="นามสกุล"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md6
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="nickname"
                              label="ชื่อเล่น"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md6
                        ><div>
                          <v-card-text>
                            <v-text-field
                              type="number"
                              v-model="age"
                              label="อายุ"
                              :rules="ageRules"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12
                        ><div>
                          <v-card-text>
                            <v-select
                              :items="schools"
                              label="โรงเรียน"
                              :rules="schoolRules"
                              outlined
                              v-model="school"
                            ></v-select>
                          </v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md6
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
                      <v-flex xs12 md6
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
                      <v-flex xs12 md3
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="tel"
                              label="เบอร์โทร"
                              :rules="telRules"
                              :height="20"
                              outlined
                            ></v-text-field>
                          </v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md3
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="guardian"
                              label="ชื่อผู้ปกครอง"
                              :rules="guardianRules"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md3
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="guardian_tel"
                              label="เบอร์โทรผู้ปกครอง"
                              :rules="guardian_telRules"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md3
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="relate"
                              label="เกี่ยวข้องเป็น"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md6
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="address"
                              label="ที่อยู่"
                              :rules="addressRules"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md3
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="cometo"
                              label="มาโรงเรียนโดย"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs12 md3
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="teacher"
                              label="ครูประจำชั้น"
                              :height="20"
                              outlined
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </v-card>
              </v-flex>

              <v-col class="d-flex" cols="12">
                <div class="my-2">
                  <v-btn
                    large
                    color="#9BDEAC"
                    :disabled="!isValid"
                    @click="save"
                  >
                    <v-icon class="white--text" dark
                      >mdi-content-save-all</v-icon
                    ></v-btn
                  >
                </div>
              </v-col>
            </v-form>
          </v-layout>
        </v-container>
      </v-card>

      <vm-back-top></vm-back-top>
    </div>
  </v-container>
</template>

<script>
//popup
import swal from "sweetalert";
//database
import axios from "axios";
import { APIPath } from "../../service/APIPath";
const apiPath = new APIPath();
export default {
  name: "Home",
  components: {
    // HelloWorld,
  },
  data: () => ({
    allowSpaces: false,
    isValid: true,
    max: 13,
    idcard: "",
    idcardRules: [
      (v) => !!v || "เลขประจำตัวประชาชนยังไม่ได้ระบุ",
      (v) =>
        (v && v.length >= 13 && v && v.length < 14) ||
        "ต้องระบุเลขประจำตัวประชาชนให้ครบ 13 หลัก",
    ],
    name: "",
    nameRules: [(v) => !!v || "ชื่อยังไม่ได้ระบุ"],
    lastname: "",
    lastnameRules: [(v) => !!v || "นามสกุลยังไม่ได้ระบุ"],
    nickname: "",
    age: "",
    ageRules: [
      (v) => !!v || "อายุยังไม่ได้ระบุ",
      (v) => (v && v.length >= 1 && v && v.length <= 2) || "อายุไม่เกิน99ปี",
    ],
    school: "",
    schools: ["โรงเรียน1", "โรงเรียน2", "โรงเรียน3", "โรงเรียน4"],
    // schoolRules: [(v) => !!v || "โรงเรียนยังไม่ได้ระบุ"],
    classselect: "",
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
    rooms: ["1", "2", "3", "4", "5", "7", "8", "9", "10"],
    roomRules: [(v) => !!v || "ห้องยังไม่ได้ระบุ"],
    tel: "",
    telRules: [(v) => !!v || "เบอร์โทรยังไม่ได้ระบุ"],
    guardian: "",
    guardianRules: [(v) => !!v || "ชื่อผู้ปกครองยังไม่ได้ระบุ"],
    guardian_tel: "",
    guardian_telRules: [(v) => !!v || "เบอร์โทรยังไม่ได้ระบุ"],
    relate: "",
    address: "",
    addressRules: [(v) => !!v || "ที่อยู่ยังไม่ได้ระบุ"],
    cometo: "",
    teacher: "",
    ok: "",
  }),

  methods: {
    validateField() {
      this.$refs.form.validate();
    },
    save() {
      axios
        .get(`${apiPath.getBaseUrl()}person_save.php`, {
          params: {
            idcard: this.idcard,
            name: this.name,
            lastname: this.lastname,
            nickname: this.nickname,
            age: this.age,
            school: this.school,
            classselect: this.classselect,
            room: this.room,
            tel: this.tel,
            guardian: this.guardian,
            guardian_tel: this.guardian_tel,
            relate: this.relate,
            address: this.address,
            cometo: this.cometo,
            teacher: this.teacher,
          },
        })
        .then((response) => {
          this.ok = response.data;
          if (this.ok[0].message == "เพิ่มข้อมูลสำเร็จ") {
            swal({
              title: "แจ้งเตือน!",
              text: this.ok[0].message,
              icon: "success",
              button: "ปิด",
            });
          } else {
            swal({
              title: "แจ้งเตือน!",
              text: this.ok[0].message,
              icon: "error",
              button: "ปิด",
            });
          }
          this.$router.push("/");
        });
    },
  },
};
</script>
