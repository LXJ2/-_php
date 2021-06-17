import http from './http'

export function login(params) {
  //return http.post('login.php?phone='+params.phone+'&password='+params.password+'&position='+params.position)
  return http.post('/login.php',params)
  //return http.post('/login.php')
}
export function logout() {

  return http({
    method: 'DELETE',
    url: '/manage-api/v1/logout'
  }).then(data => {
    localStorage.removeItem('xf_project_token')
    return data
  })
}
