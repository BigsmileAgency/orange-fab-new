import Service from './service';
import axios from 'axios';

class UserService extends Service {

  connect(data) {
    return axios.post(`${this.BASE_URL}/login.php`, data, this.headers)
  }

  save_step1(data) {
    return axios.post(`${this.BASE_URL}/register.php`, data, this.headers)
  }

  set_token(token) {
    sessionStorage.setItem('token', token);
  }

  get_steps(step) {
    return axios.post(`${this.BASE_URL}/getform.php`, {
      step: step
    }, this.headers)
  }

  save_steps(data, step) {
    if (step === 3) {
      if (data.step3.participate_accelerator) {
        data.step3.participate_accelerator = 1;
      } else {
        data.step3.participate_accelerator = 0;
      }
    }
    var datas = Object.assign({}, data, {
      step: step
    })
    return axios.post(`${this.BASE_URL}/addform.php`, datas, this.headers)
  }

  get_csv(data) {
    return axios.post(`${this.BASE_URL}/admin.php`, data, this.headers)
  }

  reset_password(data) {
    return axios.post(`${this.BASE_URL}/resetpassword.php`, data, this.headers)
  }

  change_password(data) {
    return axios.post(`${this.BASE_URL}/changepassword.php`, data, this.headers)
  }

  delete_image(fileName) {
    return axios.post(`${this.BASE_URL}/delupload.php`, {
      file: fileName
    }, this.headers)
  }

}

export default UserService;
