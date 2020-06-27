//const API_URL = 'http://192.168.5.187/0161/student/screen/api/';
//const API_URL = "http://localhost/student/api/";
const API_URL = "http://192.168.4.3/webapp/tee/student/api/";
//const API_URL = "http://192.168.31.165/student/api/";
//const API_URL = "http://192.168.0.103/student/api/";

export class APIPath {
    constructor() {}

    getBaseUrl() {
        return API_URL;
    }
}