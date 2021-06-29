<template>
  <el-table
    :data="fileInfo"
    stripe
    style="width: 100%">
    <el-table-column
      prop="file_id"
      label="稿件编号"
      width="180">
    </el-table-column>
    <el-table-column
      prop="name"
      label="稿件名称"
      width="180">
    </el-table-column>
    <el-table-column
      prop="author_main"
      label="通讯作者">
    </el-table-column>
    <el-table-column
      prop="specialty_num"
      label="专业分类号">
    </el-table-column>
    <el-table-column
      prop="keywords"
      label="关键词">
    </el-table-column>
    <el-table-column
      prop="fund_project"
      label="资助项目">
    </el-table-column>
    <el-table-column
      prop="create_time	"
      label="投稿日期">
    </el-table-column>
  </el-table>
</template>

<script>
  export default {
    data() {
      return {
        tableData: [{
          date: '2016-05-02',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-04',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1517 弄'
        }, {
          date: '2016-05-01',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1519 弄'
        }, {
          date: '2016-05-03',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1516 弄'
        }]
      }
    }
  }
</script>