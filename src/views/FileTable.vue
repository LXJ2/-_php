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
      label="通讯作者"
      width="180">
    </el-table-column>
    <el-table-column
      prop="specialty_num"
      label="分类号"
      width="180">
    </el-table-column>
    <el-table-column
      prop="keywords"
      label="关键词"
      width="180">
    </el-table-column>
    <el-table-column
      prop="fund_project"
      label="资助项目"
      width="180">
    </el-table-column>
    <el-table-column
      label="操作"
      width="200">
      <template slot-scope="props">
        <el-button type="text" size="small" icon="el-icon-edit" @click="toParent">编辑</el-button>
        <el-link type="primary" :href="props.row.file_address"><i class="el-icon-view el-icon--right"></i>预览 </el-link>
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
  export default {
    props: ['fileInfo'],
    data() {
      return {
        //<el-link icon="el-icon-edit" type="primary"  target="_blank">编辑</el-link>
        data1: true,
      }
    },
    methods: {
      toParent:function() {
            this.$emit('event1', this.data1)
        }

    },

  }
</script>