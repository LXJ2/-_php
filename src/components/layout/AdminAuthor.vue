<template>
<div class="authorData">
  <el-table
    :data="authorData"
    stripe
    style="width: 100%">
    <el-table-column
      prop="author_id"
      label="作者编号"
      width="50">
    </el-table-column>
    <el-table-column
      prop="name"
      label="作者姓名"
      width="100">
    </el-table-column>
    <el-table-column
      prop="phone"
      label="联系电话"
      width="150">
    </el-table-column>
    <el-table-column
      prop="level"
      label="职称"
      width="100">
    </el-table-column>
    <el-table-column
      prop="workplace"
      label="单位"
      width="100">
    </el-table-column>
    <el-table-column
      prop="education"
      label="学历"
      width="100">
    </el-table-column>
    <el-table-column
      prop="email"
      label="邮箱"
      width="150">
    </el-table-column>
    <el-table-column
      prop="direction"
      label="研究方向"
      width="100">
    </el-table-column>
    <el-table-column
      prop="create_time"
      label="注册时间"
      width="150">
    </el-table-column>
    <el-table-column
      label="操作"
      width="200">
      <template slot-scope="scope">
          <el-button type="text" size="small" icon="el-icon-edit">编辑</el-button>
        <el-button
          @click.native.prevent="deleteRow(scope.$index, authorData)"
          type="text"
          size="small">
          移除
        </el-button>
      </template>
    </el-table-column>
  </el-table>
  </div>
</template>

<script>
import { getAuthorData } from '../../api/api';
  export default {
    //props: ['fileInfo'],
    data() {
      return {
          authorData: [],
          
      }
    },
    methods: {
        deleteRow(index, rows) {
        rows.splice(index, 1);
      },
      
    },
    created(){
       getAuthorData().then(data =>{
           data.data.forEach(item =>{
               this.authorData.push(item) ;
           });
       });
    },

  }
</script>
<style lang="less">
.authorData{
   .el-button--small{
        margin-left: 20px;
    }
}
</style>