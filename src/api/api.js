import qs from 'qs';
import http from './http';
export function login(data) {
  return http.post('/login.php',qs.stringify(data))  
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
//return http.post('login.php?phone='+params.phone+'&password='+params.password+'&position='+params.position)
//return http.post('/login.php')