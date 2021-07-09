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

export function upload(data){
  return http({
    method: 'POST',
    url:'/upload.php',
    data: data,
    headers: {
      'Content-Type': 'multipart/form-data',
    }
  })
}

export function uploadFile(data) {
  return http.post('/upload.php',qs.stringify(data));  
}

export function getFileData(){
  return http.post('/filesData.php');
}

export function updataFileStatus(data){
  return http.post('/updateFileStatus.php',qs.stringify(data));
}

export function getAuthorData(){
  return http.get('/authorsData.php');
}

export function getEditorsData(){
  return http.get('/editorsData.php');
}

export function deleteFile(data){
  return http.post('/deleteFile.php',qs.stringify(data));
}

export function addAuthors(data){
  return http.post('/addAuthors.php',qs.stringify(data));
}

export function addEditors(data){
  return http.post('/addEditors.php',qs.stringify(data));
}

export function getUserFile(params){
  return http({
    method: 'GET',
    url: '/userFile.php',
    params: params,
  })
} 

