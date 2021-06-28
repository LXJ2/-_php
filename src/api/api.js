import qs from 'qs';
import http from './http';
export function login(data) {
  return http.post('/login.php',qs.stringify(data));  
}
 export function logout(params) {

  return http({
    method: 'GET',
    url: '/logout.php',
    params: params,
  }).then(data => {
    localStorage.removeItem('srms_project_token');
    localStorage.removeItem('uid');
    return data
  })
} 

export function getUserRouters (data){
  return http.get('/routes.php?position='+ data);
}
export function getUserInfo(params){
  return http({
    method: 'GET',
    url: '/userInfo.php',
    params: params
  })
}

export function updataUserInfo(data) {
  return http.post('/updataUserInfo.php',qs.stringify(data));  
}
//return http.post('login.php?phone='+params.phone+'&password='+params.password+'&position='+params.position)
//return http.post('/login.php')