<template>
  <v-container fluid>
    <div id="e3" style="max-width: 100%; margin: auto;" class="grey lighten-3">
      <v-toolbar color="#e7305b">
        <v-toolbar-side-icon></v-toolbar-side-icon>
        <v-toolbar-title class="white--text">
          <v-icon dark>mdi-hospital-building</v-icon> COVID-19
        </v-toolbar-title>
        <v-spacer></v-spacer>
      </v-toolbar>
      <v-card>
        <v-container fluid style="min-height: 0;" grid-list-lg>
          <v-layout row wrap>
            <v-form v-model="isValid" ref="form">
              <v-flex xs12>
                <v-card color="#e2979c" class="white--text">
                  <v-card-title class="headline "
                    >แบบฟอร์มประเมินตัวเอง</v-card-title
                  >

                  <v-card-subtitle class="white--text"
                    >เฝ้าระวังการติดเชื้อไวรัสโคโรน่า2019</v-card-subtitle
                  >
                </v-card>
              </v-flex>
              <v-flex xs12>
                <v-card>
                  <v-alert type="info" color="#6886c5">
                    หน้านี้สำหรับคนที่ผ่านการลงทะเบียนประวัติแล้ว
                    ถ้ายังไม่ได้ลงทะเบียนให้ไปที่หน้า <strong>'ประวัติ'</strong>
                  </v-alert>
                </v-card>
              </v-flex>
              <!-- 1 -->
              <v-flex xs12>
                <v-card>
                  <v-card-text>
                    <v-avatar color="#0A97B0" size="36">
                      <span class="white--text headline">2</span>
                    </v-avatar>
                    <div>ค้นหานักเรียนจากเลขประจำตัวประชาชน 13 หลัก</div>
                  </v-card-text>
                  <v-card-title primary-title>
                    <div class="headline"></div>

                    <v-card-text>
                      <v-text-field
                        v-model="idcard"
                        :counter="max"
                        :rules="idcardRules"
                        label="เลขประจำตัวประชาชน 13 หลัก"
                        :height="20"
                        outlined
                      ></v-text-field
                    ></v-card-text>
                  </v-card-title>
                  <v-card-text>
                    <v-btn
                      class="mx-2"
                      fab
                      dark
                      large
                      color="#9BDEAC"
                      @click="search_id"
                    >
                      <v-icon dark>mdi-account-search</v-icon>
                    </v-btn></v-card-text
                  >
                </v-card>
              </v-flex>
              <!-- 2 -->
              <v-flex xs12>
                <v-card>
                  <v-card-text>
                    <div>ประวัติ</div>
                  </v-card-text>
                  <v-container fluid grid-list-lg>
                    <v-layout row>
                      <v-flex xs6
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="name"
                              label="ชื่อ"
                              :height="20"
                              outlined
                              disabled
                            ></v-text-field
                          ></v-card-text>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <v-card-text>
                            <v-text-field
                              v-model="lastname"
                              label="นามสกุล"
                              :height="20"
                              outlined
                              disabled
                            ></v-text-field
                          ></v-card-text>
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
                              disabled
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
                              outlined
                              v-model="classselect"
                              disabled
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
                              outlined
                              v-model="room"
                              disabled
                            ></v-select
                          ></v-card-text>
                        </div>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </v-card>
              </v-flex>
              <!-- 3 -->
              <v-flex xs12>
                <v-card>
                  <v-card-text>
                    <div>วันที่</div>
                  </v-card-text>
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
                </v-card>
              </v-flex>

              <!-- 6 -->
              <v-flex xs12>
                <v-card>
                  <v-card-text>
                    <div>มีอาการเหล่านี้หรือไม่</div>
                    <div><code>&lt;ต้องตอบทุกข้อ&gt;</code></div>
                  </v-card-text>
                  <v-container fluid grid-list-lg>
                    <v-layout row>
                      <!-- choice 1 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>ไข้</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice1"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 2 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>ไอ</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice2"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 3 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>เจ็บคอ</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice3"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 4 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>มีน้ำมูก</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice4"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 5 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>มีเสมหะ</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice5"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 6 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>หายใจเร็ว</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice6"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 7 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>หอบเหนื่อย</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice7"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 8 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>จมูกไม่ได้กลิ่น</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice8"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>

                      <!-- choice 9 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>ปวดศีรษะ</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice9"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 10 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>ถ่ายเหลว</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice10"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 11 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>เพลีย</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <enhanced-toggle
                            labelOn="มี"
                            labelOff="ไม่มี"
                            v-model="choice11"
                            rounded="true"
                            styleOn="primary"
                            styleOff="danger"
                          />
                        </div>
                      </v-flex>
                      <!-- choice 12 -->
                      <v-flex xs6
                        ><div>
                          <v-col class="d-flex" cols="12">
                            <strong>อื่นๆ</strong>
                          </v-col>
                        </div>
                      </v-flex>
                      <v-flex xs6
                        ><div>
                          <v-textarea
                            outlined
                            name="input-7-4"
                            label="ระบุ"
                            v-model="choice_other"
                          ></v-textarea>
                        </div>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </v-card>
              </v-flex>
              <!-- 7 -->
              <v-flex xs12>
                <v-card>
                  <v-card-text>
                    <div>มีประวัติเหล่านี้หรือไม่ ในช่วง 14 วันที่ผ่านมา</div>
                  </v-card-text>
                  <v-container fluid grid-list-lg>
                    <v-layout row>
                      <!-- history1 -->
                      <v-flex xs12
                        ><div>
                          <v-checkbox
                            v-model="history1"
                            class="mx-2"
                            label="มีประวัติเดินทางไปยัง หรือ มาจาก หรือ อยู่อาศัยในพื้นที่เกิดโรคติดเชื้อไวรัสโคโรน่า 2019 เช่น กลับจากต่างประเทศกลุ่มเสี่ยง หรือกลับจากจังหวัดเสี่ยง คือจังหวัดภูเก็ต"
                          ></v-checkbox>
                        </div>
                      </v-flex>
                      <!-- history2 -->
                      <v-flex xs12
                        ><div>
                          <v-checkbox
                            v-model="history2"
                            class="mx-2"
                            label="ไปในสถานที่ชุมนุมชน หรือสถานที่ที่มีการรวมกลุ่มคน เช่น ตลาดนัด ห้างสรรพสินค้า สถานพยาบาล หรือ ขนส่งสาธารณะ"
                          ></v-checkbox>
                        </div>
                      </v-flex>
                      <!-- history3 -->
                      <v-flex xs12
                        ><div>
                          <v-checkbox
                            v-model="history3"
                            class="mx-2"
                            label="สัมผัสกับผู้ป่วยยืนยันโรคติดเชื้อไวรัสโคโรน่า 2019"
                          ></v-checkbox>
                        </div>
                      </v-flex>
                      <!-- history4 -->
                      <v-flex xs12
                        ><div>
                          <v-checkbox
                            v-model="history4"
                            class="mx-2"
                            label="สัมผัสกับผู้ป่วยยืนยันโรคติดเชื้อไวรัสโคโรน่า 2019"
                          ></v-checkbox>
                        </div>
                      </v-flex>
                      <!-- history5 -->
                      <v-flex xs12
                        ><div>
                          <v-checkbox
                            v-model="history5"
                            class="mx-2"
                            label="ไม่มีประวัติเหล่านี้"
                          ></v-checkbox>
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
                    @click="save()"
                    :disabled="!isValid"
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
    </div>
  </v-container>
</template>

<script>
// checkbox
import { EnhancedToggle } from "vue-enhanced-check";
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
    EnhancedToggle,
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

    lastname: "",

    // date: new Date().toISOString().substr(0, 10),
    date: "",
    dateRules: [(v) => !!v || "วันที่ยังไม่ได้ระบุ"],
    school: "",
    schools: ["โรงเรียน1", "โรงเรียน2", "โรงเรียน3", "โรงเรียน4"],
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
    room: "",
    rooms: ["1", "2", "3", "4", "5", "7", "8", "9", "10"],

    choice1: "",
    choice2: "",
    choice3: "",
    choice4: "",
    choice5: "",
    choice6: "",
    choice7: "",
    choice8: "",
    choice9: "",
    choice10: "",
    choice11: "",
    choice_other: "",
    history1: "",
    history2: "",
    history3: "",
    history4: "",
    history5: "",
    ok: "",
    person_data: "",
  }),

  methods: {
    validateField() {
      this.$refs.form.validate();
    },
    search_id() {
      axios
        .get(`${apiPath.getBaseUrl()}person_select.php`, {
          params: { idcard: this.idcard },
        })
        .then((response) => {
          this.person_data = response.data;
          this.get_person(this.person_data);
        });
    },
    get_person() {
      this.name = this.person_data[0].name;
      this.lastname = this.person_data[0].lastname;
      this.school = this.person_data[0].schools;
      this.classselect = this.person_data[0].classes;
      this.room = this.person_data[0].rooms;
    },
    save() {
      axios
        .get(`${apiPath.getBaseUrl()}home_save.php`, {
          params: {
            date: this.date,
            idcard: this.idcard,
            choice1: this.choice1,
            choice2: this.choice2,
            choice3: this.choice3,
            choice4: this.choice4,
            choice5: this.choice5,
            choice6: this.choice6,
            choice7: this.choice7,
            choice8: this.choice8,
            choice9: this.choice9,
            choice10: this.choice10,
            choice11: this.choice11,
            choice_other: this.choice_other,
            history1: this.history1,
            history2: this.history2,
            history3: this.history3,
            history4: this.history4,
            history5: this.history5,
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
          window.location.reload();
        });
    },
  },
};
</script>
