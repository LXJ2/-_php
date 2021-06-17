<template>
  <el-aside
    class='myaside_box'
    width="200px"
  >
    <div class="scroll_box">
      <div class="welcome">欢迎您</div>
      <el-menu
        default-active="1-4-1"
        class="el-menu-vertical-demo"
        @open="handleOpen"
        @close="handleClose"
        :collapse="isCollapse"
        router
        :default-active="$route.path"
      >
        <el-submenu
          :index="index+''"
          v-for='(item,index) in navList'
        >
          <template slot="title">

            <span slot="title">{{item.groupName}}</span>
          </template>
          <el-menu-item
            :index="k.path"
            v-for='(k,i) in item.list'
          >
            <i class="el-icon-location"></i>{{k.meta.title}}
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
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    },
  },
  computed: {
    navList() {
      let ary = routes[0].children;
      // console.log(ary);
      let temp = []; //[{groupName:"xxx",list:[]},{groupName:"qqq",list:[]}]
      ary.forEach((item) => {
        let res = temp.filter((val) => val.groupName == item.meta.groupName);
        if (!res.length) {
          temp.push({
            groupName: item.meta.groupName,
            list:
              this.$store.state.userInfo.userLevel >= item.meta.level
                ? [item]
                : [],
          });
        } else {
          this.$store.state.userInfo.userLevel >= item.meta.level
            ? res[0].list.push(item)
            : null;
        }
      });

      return temp;
    },
  },
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
</style>