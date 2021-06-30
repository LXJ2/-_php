<template>
  <el-container>
    <myaside />
    <el-container>
      <el-header>
        <el-link type="success">{{this.userInfo.name}}欢迎您</el-link>
        <el-avatar size="small" :src="circleUrl" ></el-avatar>
        <button @click="logout()">退出登录</button>
      </el-header>
      
      <el-main>
        <div class="content_box">
          <router-view></router-view>
        </div>
      </el-main>
      <el-footer>   
      版权所有： 《xxxxxxxxx》杂志社 
      地址：北京海淀区阜成路14号《xxxxxxx》杂志社电话：010-57793698，分机号：8009稿件查询、8002财务、8008出刊修改;
      传真：010-68373574 邮 编：100048  
       2007 All rights reserved.
      </el-footer>
    </el-container>
  </el-container>
</template>
<script>
// @ is an alias to /src
import myaside from "../components/layout/aside";
import { getUserInfo,logout } from '../api/api';
import store from '../store';


export default {
  name: "Layout",
  data() {
    return {
      circleUrl: "https://cube.elemecdn.com/0/88/03b0d39583f48206768a7534e55bcpng.png",
      userInfo: '',
    };
  },
  created() {
    let obj = {};
    obj.position = this.$store.state.uid;
    obj.create_time = localStorage.getItem('srms_project_token');
    getUserInfo(obj).then( data => {
      this.userInfo = data.data;
      store.commit('setUserInfo',data.data);
      
    });
     //location.reload();
  },
  computed: {
    
  },
  methods: {
    logout() {
      let obj = {};
    obj.position = this.$store.state.uid;
    obj.create_time = localStorage.getItem('srms_project_token');
      logout(obj).then(() => {
        this.$router.replace("/login");
        location.reload();
      });

    },
  },
  components: { 
    myaside,
    },
};
</script>
<style lang="less">

.el-header,
.el-footer {
  background-color: #b3c0d1;
  color: #333;
  text-align: center;
  //line-height: 60px;
  padding: 20px;
  font-size:10px;
}
.el-footer{
   padding:20px;
}
.el-aside {
  background-color: #d3dce6;
  color: #333;
  text-align: center;
  line-height: 200px;
}

main.el-main {
  background-color: #e9eef3;
  color: #333;
  
  
  .content_box {
    //position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px;
    height: 100%;
    overflow-y: scroll;
  }
}

.el-container {
  height: 100%;
}

.el-container:nth-child(5) .el-aside,
.el-container:nth-child(6) .el-aside {
  line-height: 260px;
}

.el-container:nth-child(7) .el-aside {
  line-height: 320px;
}
</style>