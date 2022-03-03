
// export default Service;



import { BASE_URL } from '../conf';

class Service {

    constructor(){
        this.headers = sessionStorage.getItem('token') ? { 'headers' : { 'Auth' : sessionStorage.getItem('token') } } : {};
        this.BASE_URL = BASE_URL;
    }

}

export default Service;
