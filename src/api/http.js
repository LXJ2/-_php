import axios from 'axios';
var http = axios.create({
  baseURL: 'http://www.srms.cn'// process.env.NODE_ENV == 'development' ? '' : 'http://backend-api-02.newbee.ltd',
  
  
});
// console.log(router)

// 添加请求拦截器
/* http.interceptors.request.use(function (config) {
  // 在发送请求之前做些什么
   console.log(config)
  config.headers.token = localStorage.getItem('srms_project_token')
  
  return config;
}, function (error) {
  // 对请求错误做些什么
  return Promise.reject(error);
});
 */
// 添加响应拦截器
/* http.interceptors.response.use(function (response) {
  // 对响应数据做点什么
  //  做一些出错的处理
  let data = response.data;
  console.log(data.resultCode)
  if (data.resultCode != 200) {
    Vue.prototype.$alert(data.msg, '警告', {
      confirmButtonText: '确定',
      type: 'error',
      callback() {
        if (data.resultCode == 1) {
          router.push('/login?from=' + router.currentRoute.path)
        }
      }
    });
    return Promise.reject()
  }
  return data;
}, function (error) {
  // 对响应错误做点什么
  Vue.prototype.$alert("系统繁忙，请稍后重试", '警告', {
    confirmButtonText: '确定',
    type: 'error',
  });
  return Promise.reject(error);
}); */

export default http