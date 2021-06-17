import {
  Button, Input, Form, FormItem,
  MessageBox, Container, Aside, Header,
  Footer, Main, Menu, MenuItem, MenuItemGroup,
  Submenu, Table, TableColumn, Pagination, Dialog,
  Upload, Popconfirm, Select, Option, Message
} from 'element-ui'
import Vue from 'vue'

[Button, Input, Form, FormItem,
  Container, Aside, Header, Footer,
  Main, Menu, MenuItem, MenuItemGroup,
  Submenu, Table, TableColumn, Pagination, Dialog,
  Upload, Popconfirm, Select, Option].forEach(item => {
    Vue.use(item)
  })
// Vue.use(Button)


Vue.prototype.$msgbox = MessageBox;
Vue.prototype.$alert = MessageBox.alert;
Vue.prototype.$confirm = MessageBox.confirm;
Vue.prototype.$prompt = MessageBox.prompt;
Vue.prototype.$message = Message;