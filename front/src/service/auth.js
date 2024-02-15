import { jwtDecode } from "jwt-decode";

const auth = {
  login(token) {
    localStorage.setItem('token', token)
  },

  logout() {
    localStorage.removeItem('token')
  },

  isLogged() {
    if (localStorage.getItem('token') === null) {
      return false
    }
    return true
  },

  getToken() {
    if (this.isLogged() === false) {
      return null
    }
    const token = localStorage.getItem('token')
    return jwtDecode(token)
  },

  getJwt() {
    return localStorage.getItem('token')
  },

  isAdmin() {
    if (this.isLogged() === false) {
      return false
    }

    const token = jwt_decode(localStorage.getItem('token'))
    return token.roles.includes('ROLE_ADMIN')
  },
}

export default auth
