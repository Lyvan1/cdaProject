import Vue from 'vue'
import axios from 'axios'
import auth from '../service/auth'

// Full config:  https://github.com/axios/axios#request-config
axios.defaults.baseURL =
  process.env.baseURL || process.env.apiUrl || 'http://localhost'
// axios.defaults.headers.common['Authorization'] = AUTH_TOKEN;
// axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

if (auth.isLogged() === true) {
  axios.defaults.headers.common['Authorization'] = 'Bearer ' + auth.getJwt()
}

let config = {
  // baseURL: process.env.baseURL || process.env.apiUrl || ""
  // timeout: 60 * 1000, // Timeout
  // withCredentials: true, // Check cross-site Access-Control
}

const _axios = axios.create(config)

_axios.interceptors.request.use(
  function (config) {
    // Do something before request is sent
    return config
  },
  function (error) {
    // Do something with request error
    return Promise.reject(error)
  }
)

// Add a response interceptor
_axios.interceptors.response.use(
  function (response) {
    // Do something with response data
    return response
  },
  function (error) {
    // Do something with response error
    return Promise.reject(error)
  }
)

export default axios
