<template>
  <el-aside
    class='myaside_box'
    width="200px"
  >
    <div class="scroll_box" >
      
      <el-menu
        default-active="/home"
        class="el-menu-vertical-demo"
        @open="handleOpen"
        @close="handleClose"
        :collapse="isCollapse"
        router
        :default-active="$route.path"
      >
        <el-submenu
          :index="item.path"
          v-for='(item,index) in $store.state.userRouters'
          :key="index"
        >
          <template slot="title">

            <span slot="title">{{item.title}}</span>
          </template>
          <el-menu-item
            :index="k.path"
            v-for='(k,i) in item.children'
            :key="i"
          >
            <i class="el-icon-location"></i>{{k.title}}
          </el-menu-item>
        </el-submenu>
      </el-menu>
    </div>
  </el-aside>
</template>
<script>
// @ is an alias to /src
/* 
  addRoute('父路径的名字',{path:'',component:''})
  使用addRoute的时候一般会把请求回来的数据存储大 vuex中 
  为了放置vuex在页面刷新时数据丢失 我们会把vuex的数据再存一份到localStorage中
*/
import { routes } from "../../router/index";
export default {
  name: "myaside",
  data() {
    return {
      isCollapse: false,
    };
  },
  methods: {
    handleOpen(key, keyPath) {
      //console.log(this.$store.state.userRouters);
    },
    handleClose(key, keyPath) {
      //console.log(key, keyPath);
    },
  },
  computed: {
    
  },
  created(){
    // console.log(this.$store.state.userInfo);
  }
};
</script>
<style lang="less">
.myaside_box.el-aside {
  overflow: hidden;
  .scroll_box {
    .welcome{
      height: 60px;
      width: 100%;
    }
    width: 110%;
    height: 100%;
    overflow-y: scroll;
    .el-submenu__title,
    .el-menu-item {
      text-align: left;
    }
  }
}
.el-menu-vertical-demo{
    margin-top: 90px;
    
}
</style>
